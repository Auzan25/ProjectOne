<div class="max-w-4xl mx-auto p-6 space-y-6">
    <!-- En-tête avec bouton retour et titre -->
    <div class="flex justify-between items-center">
        <a href="{{ route('admin.users') }}" wire:navigate class="flex items-center text-blue-600 hover:text-blue-800 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Retour à la liste
        </a>
        
        <h1 class="text-2xl font-bold text-gray-800">
            {{ $isEditing ? 'Modifier Utilisateur' : 'Créer un Nouvel Utilisateur' }}
        </h1>
    </div>

    <!-- Formulaire -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-6 space-y-6">
            @if (session()->has('message'))
                <div class="p-4 bg-green-50 text-green-700 rounded-lg border border-green-200 mb-6">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="submit" class="space-y-6">
                <!-- Section Informations Personnelles -->
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-700 border-b pb-2">Informations Personnelles</h2>
                    
                    <!-- Civilité -->
                    <div>
                        <label class="block text-gray-700 mb-2">Civilité</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" wire:model="civility" value="Monsieur" class="form-radio h-4 w-4 text-blue-600">
                                <span class="ml-2">Monsieur</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" wire:model="civility" value="Madame" class="form-radio h-4 w-4 text-blue-600">
                                <span class="ml-2">Madame</span>
                            </label>
                        </div>
                    </div>

                    <!-- Nom et Prénom -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="lastname" class="block text-gray-700 mb-2">
                                Nom <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="lastname" id="lastname" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('lastname') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="firstname" class="block text-gray-700 mb-2">
                                Prénom(s) <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="firstname" id="firstname" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('firstname') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Matricule et Date de naissance -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="matricule" class="block text-gray-700 mb-2">Matricule</label>
                            <div class="flex items-center">
                                <input type="text" wire:model="matricule" id="matricule" 
                                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <button type="button" wire:click="generateNewMatricule" 
                                        class="ml-2 p-2 bg-gray-100 hover:bg-gray-200 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label for="date_naissance" class="block text-gray-700 mb-2">Date de naissance</label>
                            <input type="date" wire:model="date_naissance" id="date_naissance" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Section Contact -->
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-700 border-b pb-2">Coordonnées</h2>
                    
                    <!-- Adresse et Ville -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="address" class="block text-gray-700 mb-2">Adresse complète</label>
                            <textarea wire:model="address" id="address" rows="2"
                                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                        <div>
                            <label for="ville" class="block text-gray-700 mb-2">Ville</label>
                            <input type="text" wire:model="ville" id="ville" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <!-- Email et Téléphones -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="email" class="block text-gray-700 mb-2">
                                E-mail <span class="text-red-500">*</span>
                            </label>
                            <input type="email" wire:model="email" id="email" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="mobile_phone" class="block text-gray-700 mb-2">Téléphone mobile</label>
                            <input type="tel" wire:model="mobile_phone" id="mobile_phone" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="telephone_fixe" class="block text-gray-700 mb-2">Téléphone fixe</label>
                            <input type="tel" wire:model="telephone_fixe" id="telephone_fixe" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Section Sécurité -->
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-700 border-b pb-2">Sécurité</h2>
                    
                    <!-- Mot de passe -->
                    @if (!$isEditing)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-gray-700 mb-2">
                                    Mot de passe <span class="text-red-500">*</span>
                                </label>
                                <input type="password" wire:model="password" id="password" 
                                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-gray-700 mb-2">
                                    Confirmation <span class="text-red-500">*</span>
                                </label>
                                <input type="password" wire:model="password_confirmation" id="password_confirmation" 
                                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-gray-700 mb-2">Nouveau mot de passe</label>
                                <input type="password" wire:model="password" id="password" 
                                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-gray-700 mb-2">Confirmation</label>
                                <input type="password" wire:model="password_confirmation" id="password_confirmation" 
                                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-gray-700 mb-2">Description</label>
                    <textarea wire:model="description" id="description" rows="3"
                              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>

                <!-- Bouton de soumission -->
                <div class="pt-4">
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 shadow-md">
                        {{ $isEditing ? 'Mettre à jour' : 'Créer l\'utilisateur' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>