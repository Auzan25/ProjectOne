<div class="container mx-auto px-4 py-6">
    <!-- En-tête avec solde -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
            {{ $civility }} {{ $lastname }} {{ $firstname }}
        </h1>
        
        <div class="flex items-center gap-3 bg-white rounded-lg shadow-sm p-3">
            <button wire:click="$dispatch('openModal', { component: 'customer.balance-edit', arguments: { customer: {{ $customerId }} }})"
                class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </button>
            
            <div class="text-lg font-semibold px-2">
                Solde: 
                @if($balanceVisible)
                    {{-- <span class="text-green-600">{{ number_format($customer->balance, 0, ',', ' ') }} FCFA</span> --}}
                    <span class="text-green-600">{{ number_format(580000, 0, ',', ' ') }} FCFA</span>
                @else
                    <span class="text-gray-400">•••••••</span>
                @endif
            </div>
            
            <button wire:click="toggleBalance" class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-50 rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Navigation par onglets corrigée -->
    <div class="mb-6 border-b border-gray-200">
        <nav class="flex space-x-8">
            <button wire:click="changeTab('info')" 
                    @class([
                        'border-blue-500 text-blue-600' => $activeTab === 'info',
                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' => $activeTab !== 'info'
                    ])
                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Informations
            </button>
            <button wire:click="changeTab('history')" 
                    @class([
                        'border-blue-500 text-blue-600' => $activeTab === 'history',
                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' => $activeTab !== 'history'
                    ])
                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Historique d'achats
            </button>
        </nav>
    </div>

    <!-- Section Informations (affichage direct sans accordéon) -->
    @if($activeTab === 'info')
    <div class="mb-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="border-t border-gray-200">
                <!-- Informations personnelles -->
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Informations personnelles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Civilité</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $civility }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nom</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $lastname }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Prénom(s)</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $firstname }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Date de naissance</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $birthdate ? \Carbon\Carbon::parse($birthdate)->format('d/m/Y') : 'Non renseignée' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Adresse -->
                <div class="px-4 py-5 sm:px-6 border-t border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Adresse</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Adresse complète</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $address }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Ville</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $city }}</p>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <div class="px-4 py-5 sm:px-6 border-t border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Coordonnées</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">E-mail</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Téléphone mobile</p>
                            <!-- Formatage du numéro de téléphone -->
                            @php
                                $formattedNumber = substr($mobile_phone, 0, 4) . ' ' . substr($mobile_phone, 4, 2) . ' ' . substr($mobile_phone, 6, 3) . ' ' . substr($mobile_phone, 9, 2) . ' ' . substr($mobile_phone, 11);
                                $formattedFixedPhone = substr($fixed_phone, 0, 4) . ' ' . substr($fixed_phone, 4, 2) . ' ' . substr($fixed_phone, 6, 3) . ' ' . substr($fixed_phone, 9, 2) . ' ' . substr($fixed_phone, 11);
                            @endphp
                            {{-- <p class="mt-1 text-sm text-gray-900">{{ $mobile_phone ?? 'Non renseigné' }}</p> --}}
                            <p class="mt-1 text-sm text-gray-900">{{ $mobile_phone ? $formattedNumber : 'Non renseigné' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Téléphone fixe</p>
                            {{-- <p class="mt-1 text-sm text-gray-900">{{ $fixed_phone ?? 'Non renseigné' }}</p> --}}
                            <p class="mt-1 text-sm text-gray-900">{{ $fixed_phone ? $formattedFixedPhone : 'Non renseigné' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Autres informations -->
                <div class="px-4 py-5 sm:px-6 border-t border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Autres informations</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Magasin de réception</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $magasin_reception ?? 'Non spécifié' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Description</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $description ?? 'Aucune description' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Date de création</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Dernière mise à jour</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Agent enregistreur</p>
                            {{-- <p class="mt-1 text-sm text-gray-900">{{ $agentName ?? 'Non spécifié' }}</p> --}}
                            <p class="mt-1 text-sm text-gray-900">
                                @if ($agentName->id == auth()->user()->id)
                                    Moi-même
                                @else
                                    {{ $agentName->name }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Section Historique d'achats -->
    @if($activeTab === 'history')
    <div class="mb-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Historique des achats</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produit</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix unitaire</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Magasin</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- @forelse($purchases as $purchase)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $purchase->product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($purchase->price, 0, ',', ' ') }} FCFA</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $purchase->quantity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $purchase->store->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $purchase->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ number_format($purchase->price * $purchase->quantity, 0, ',', ' ') }} FCFA</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Aucun achat enregistré</td>
                            </tr>
                        @endforelse --}}
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Aucun achat enregistré</td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-gray-50">
                        <tr>
                            <td colspan="5" class="px-6 py-3 text-right text-sm font-medium text-gray-900">Somme Totale</td>
                            {{-- <td class="px-6 py-3 whitespace-nowrap text-sm font-bold text-gray-900">{{ number_format($totalAmount, 0, ',', ' ') }} FCFA</td> --}}
                            <td class="px-6 py-3 whitespace-nowrap text-sm font-bold text-gray-900">{{ number_format(510000, 0, ',', ' ') }} FCFA</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>