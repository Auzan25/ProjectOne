<div>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Formulaire d'inscription</h2>
        
        <form wire:submit.prevent="inscription" class="space-y-4">
            <!-- Civilité -->
            <div>
                <label class="block text-gray-700 mb-2" for="civility">
                    Civilité <span class="text-red-500">*</span>
                </label>
                <div class="flex space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model="civility" value="Monsieur" class="form-radio h-5 w-5 text-blue-600">
                        <span class="ml-2">Monsieur</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model="civility" value="Madame" class="form-radio h-5 w-5 text-blue-600">
                        <span class="ml-2">Madame</span>
                    </label>
                </div>
                @error('civility') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Nom et Prénom -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="lastname" class="block text-gray-700 mb-2">
                        Nom <span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="lastname" id="lastname" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('lastname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="firstname" class="block text-gray-700 mb-2">
                        Prénom(s) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="firstname" id="firstname" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('firstname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Date de naissance -->
                <div>
                    <label for="birthdate" class="block text-gray-700 mb-2">Date de naissance</label>
                    <input type="date" wire:model="birthdate" id="birthdate" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('birthdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <!-- Lieu de naissance -->
                <div>
                    <label for="birthplace" class="block text-gray-700 mb-2">Lieu de naissance</label>
                    <input type="text" wire:model="birthplace" id="birthplace" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('birthplace') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Adresse -->
            <div>
                <label for="address" class="block text-gray-700 mb-2">
                    Adresse complète <span class="text-red-500">*</span>
                </label>
                <textarea wire:model="address" id="address" rows="3"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Ville -->
                <div>
                    <label for="city" class="block text-gray-700 mb-2">
                        Ville <span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="city" id="city" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 mb-2">
                        E-mail
                    </label>
                    <input type="email" wire:model="email" id="email" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Téléphones -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="mobile_phone" class="block text-gray-700 mb-2">Numéro de téléphone mobile <span class="text-red-500">*</span></label>
                    <input type="tel" wire:model="mobile_phone" id="mobile_phone" onchange="completePhoneNumber" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="tel" wire:model="full_mobile_phone" id="full_mobile_phone" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('mobile_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="fixed_phone" class="block text-gray-700 mb-2">N° de téléphone fixe</label>
                    <input type="tel" wire:model="fixed_phone" id="fixed_phone" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Magasin de réception -->
            <div>
                <label for="magasin_reception" class="block text-gray-700 mb-2">Magasin de réception</label>
                <select wire:model="magasin_reception" id="magasin_reception" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Sélectionnez un magasin</option>
                    <option value="Auchan Yoff">Auchan Yoff</option>
                    <option value="Auchan Mbour">Auchan Mbour</option>
                    <option value="Auchan Keur Massar">Auchan Keur Massar</option>
                    <option value="Auchan Mermoz">Auchan Mermoz</option>
                </select>
            </div>

            <!-- Description -->
            <div>
                <label for="address" class="block text-gray-700 mb-2">
                    Description
                </label>
                <textarea wire:model="description" id="description" rows="3"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Formulaire Carte de Fidélité -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Carte de Fidélité</h2>
                
                <div class="space-y-4">
                    <!-- Numéro de carte -->
                    <div>
                        <label for="card_number" class="block text-gray-700 mb-2">
                            Numéro de carte <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center">
                            <input type="text" wire:model="card_number" id="card_number" 
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="button" wire:click="$set('card_number', generateCardNumber())" 
                                    class="ml-2 px-3 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">
                                Générer
                            </button>
                        </div>
                        @error('card_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Solde -->
                    <div>
                        <label for="balance" class="block text-gray-700 mb-2">Solde initial</label>
                        <div class="relative">
                            {{-- <span class="absolute left-3 top-1/2 transform -translate-y-1/2">€</span>
                            <input type="number" wire:model="balance" id="balance" step="0.01" min="0"
                                class="w-full pl-8 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                             --}}
                            <span class="absolute right-10 top-1/2 transform -translate-y-1/2">FCFA</span>
                            <input type="number" wire:model="balance" id="balance" step="0.01" min="0"
                                class="w-full pl-4 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        @error('balance') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Code barres -->
                    <div>
                        <label for="barcode" class="block text-gray-700 mb-2">
                            Code barres <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center">
                            <input type="text" wire:model="barcode" id="barcode" 
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="button" wire:click="$set('barcode', generateBarcode())" 
                                    class="ml-2 px-3 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">
                                Générer
                            </button>
                        </div>
                        @error('barcode') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Aperçu de la carte -->
                    <div class="mt-6 p-4 border-2 border-dashed border-gray-300 rounded-lg">
                        <h3 class="font-semibold text-gray-700 mb-2">Aperçu de la carte</h3>
                        <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-4 rounded-lg text-white">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm">Carte Fidélité</p>
                                    <p class="font-bold text-xl">{{ $card_number }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm">Solde</p>
                                    {{-- <p class="font-bold text-xl">{{ number_format($balance, 2) }} FCFA</p> --}}
                                    <p class="font-bold text-xl">{{ number_format($balance, 2) }} FCFA</p>
                                </div>
                            </div>
                            <div class="mt-4 pt-2 border-t border-blue-400">
                                <p class="text-xs">Code: {{ $barcode }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton de soumission -->
            <div class="pt-4">
                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                    Enregistrer l'inscription
                </button>
            </div>

            @if (session()->has('message'))
                <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif
        </form>
    </div>
</div>
