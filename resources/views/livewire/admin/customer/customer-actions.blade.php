<div>
    {{-- <div class="max-w-4xl mx-auto p-6 space-y-6"> --}}
        <div class="max-w-2xl mx-auto p-6 bg-blue-50 shadow-md">
        <!-- En-tête avec bouton retour et titre -->
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.customers') }}" wire:navigate class="flex items-center text-blue-600 hover:text-blue-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Retour à la liste
                </a>

                <h2 class="text-2xl font-bold text-gray-800 text-center">Formulaire d'inscription</h2>
            </div>
        </div>

    <div class="max-w-2xl mx-auto p-6 bg-white rounded-b-lg shadow-md">

        {{-- <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Formulaire d'inscription</h2> --}}
        
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
                <div wire:ignore>
                    <label for="mobile_phone" class="block text-gray-700 mb-2">Numéro de téléphone mobile <span class="text-red-500">*</span></label>
                    <input type="tel" wire:model="mobile_phone" id="mobile_phone"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <span id="valid-msg" class="hidden text-green-700 text-sm">✓ Valide</span>
                        <span id="error-msg" class="hidden text-red-500 text-sm"></span>
                        <input type="hidden" wire:model="phone_full" name="phone_full" id="phone_full">
                        <input type="hidden" name="country_code" wire:model="country_code">
                        @error('mobile_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="fixed_phone" class="block text-gray-700 mb-2">N° de téléphone fixe</label>
                    <input type="tel" wire:model="fixed_phone" id="fixed_phone" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Magasin de réception -->
            <h4 class="hidden">{{ $selectedMagasin }}</h4>
            <!-- Using Select2 -->
            <div wire:ignore>
                <label for="magasin_reception" class="block text-gray-700 mb-2">Magasin de réception</label>
                <select id="select2-dropdown" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Sélectionnez un magasin</option>
                    <option value="Auchan Yoff">Auchan Yoff</option>
                    <option value="Auchan Mbour">Auchan Mbour</option>
                    <option value="Auchan Keur Massar">Auchan Keur Massar</option>
                    <option value="Auchan Mermoz">Auchan Mermoz</option>
                </select>
            </div>
            {{-- <div>
                <label for="magasin_reception" class="block text-gray-700 mb-2">Magasin de réception</label>
                <select wire:model="magasin_reception" id="magasin_reception" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Sélectionnez un magasin</option>
                    <option value="Auchan Yoff">Auchan Yoff</option>
                    <option value="Auchan Mbour">Auchan Mbour</option>
                    <option value="Auchan Keur Massar">Auchan Keur Massar</option>
                    <option value="Auchan Mermoz">Auchan Mermoz</option>
                </select>
            </div> --}}

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
                        class="cursor-pointer w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
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


<!-- after stack script in layout - then push script -->
@push('scripts')
    <script>
        const input = document.querySelector("#mobile_phone");
        //const button = document.querySelector("#btn");
        const errorMsg = document.querySelector("#error-msg");
        const validMsg = document.querySelector("#valid-msg");

        // here, the index maps to the error code returned from getValidationError - see readme
        //const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
        const errorMap = ["Numéro invalide", "Code pays invalide", "Trop court", "Trop long", "Numéro invalide"]; // fr

        // initialise plugin
        const iti = window.intlTelInput(input, {
        initialCountry: "sn",
        separateDialCode: true, // show country code
        hiddenInput: (telInputName) => ({
            phone: "phone_full",
            country: "country_code",
        }),
        loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/utils.js"),
        });


        input.addEventListener('countrychange', updateLivewire);
        input.addEventListener('blur', updateLivewire);

        function updateLivewire() {
            if (iti.isValidNumber()) {
                const fullNumber = iti.getNumber(); // récupère le numéro international complet
                // Mettre à jour la propriété Livewire "full_phone"
                @this.set('phone_full', fullNumber);
            } else {
                @this.set('phone_full', null);
            }
        }


        const reset = () => {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hidden");
        validMsg.classList.add("hidden");
        };

        const showError = (msg) => {
        input.classList.add("error");
        errorMsg.innerHTML = msg;
        errorMsg.classList.remove("hidden");
        };

        // on click button: validate
        //button.addEventListener('click', () => {
        //reset();
        //if (!input.value.trim()) {
        //    showError("Required");
        //} else if (iti.isValidNumberPrecise()) {
        //    validMsg.classList.remove("hidden");
        //} else {
        //    const errorCode = iti.getValidationError();
        //    const msg = errorMap[errorCode] || "Invalid number";
        //    showError(msg);
        //}
        //});

        // on blur: validate
        input.addEventListener('blur', () => {
        reset();
        if (input.value.trim()) {
            //if (iti.isValidNumberPrecise()) {
            if (iti.isValidNumber()) {
                validMsg.classList.remove("hidden");
                //console.log(input.value);
            } else {
                input.classList.add("error");
                var errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hidden");
            }
        }
        });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);

        
    </script>


    <script>
        $(document).ready(function() {
            $('#select2-dropdown').select2();
            $('#select2-dropdown').on('change', function(e) {
                var data = $('#select2-dropdown').select2('val');
                @this.set('selectedMagasin', data);
            });
        });
    </script>
@endpush
