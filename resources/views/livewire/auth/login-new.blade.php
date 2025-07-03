{{-- resources/views/livewire/auth/login.blade.php --}}
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-cyan-50 py-12 px-4 sm:px-6 lg:px-8"
     x-data="{ 
         showPassword: @entangle('showPassword'),
         emailFocused: false,
         passwordFocused: false
     }">
    
    {{-- Container principal avec animation d'entrée --}}
    <div class="max-w-md w-full space-y-8 transform transition-all duration-1000 ease-out opacity-0 translate-y-8"
         x-init="setTimeout(() => { $el.classList.remove('opacity-0', 'translate-y-8') }, 100)">
        
        {{-- Header --}}
        <div class="text-center">
            <div class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-105 transition-transform duration-300">
                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h2 class="mt-6 text-3xl font-bold text-gray-900">Connexion</h2>
            <p class="mt-2 text-sm text-gray-600">Accédez à votre espace CRM</p>
        </div>

        {{-- Formulaire --}}
        <form wire:submit.prevent="login" class="mt-8 space-y-6" x-data="{ isSubmitting: false }" 
              @submit="isSubmitting = true">
            
            {{-- Champ Email --}}
            <div class="relative">
                <label class="sr-only">Email</label>
                <div class="relative group">
                    <input wire:model.lazy="email" 
                           type="email" 
                           autocomplete="email" 
                           required
                           class="appearance-none relative block w-full px-4 py-3 pl-12 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:z-10 transition-all duration-300 @error('email') border-red-500 bg-red-50 @enderror"
                           placeholder="Adresse email"
                           @focus="emailFocused = true"
                           @blur="emailFocused = false">
                    
                    {{-- Icône Email --}}
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center transition-colors duration-300"
                         :class="emailFocused ? 'text-blue-500' : 'text-gray-400'">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                        </svg>
                    </div>
                    
                    {{-- Indicateur de focus --}}
                    <div class="absolute inset-0 rounded-xl opacity-0 bg-gradient-to-r from-blue-400 to-cyan-400 -z-10 blur transition-opacity duration-300"
                         :class="emailFocused ? 'opacity-20' : 'opacity-0'"></div>
                </div>
                @error('email')
                    <p class="mt-2 text-sm text-red-600 flex items-center animate-pulse">
                        <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Champ Mot de passe --}}
            <div class="relative">
                <label class="sr-only">Mot de passe</label>
                <div class="relative group">
                    <input wire:model.lazy="password" 
                           :type="showPassword ? 'text' : 'password'"
                           autocomplete="current-password" 
                           required
                           class="appearance-none relative block w-full px-4 py-3 pl-12 pr-12 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:z-10 transition-all duration-300 @error('password') border-red-500 bg-red-50 @enderror"
                           placeholder="Mot de passe"
                           @focus="passwordFocused = true"
                           @blur="passwordFocused = false">
                    
                    {{-- Icône Cadenas --}}
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center transition-colors duration-300"
                         :class="passwordFocused ? 'text-blue-500' : 'text-gray-400'">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    
                    {{-- Toggle Mot de passe --}}
                    <button type="button" 
                            wire:click="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center hover:text-blue-500 transition-colors duration-200">
                        <svg x-show="!showPassword" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg x-show="showPassword" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L12 12m-3.122-3.122L3 3m9.878 6.878L21 21"/>
                        </svg>
                    </button>
                    
                    {{-- Indicateur de focus --}}
                    <div class="absolute inset-0 rounded-xl opacity-0 bg-gradient-to-r from-blue-400 to-cyan-400 -z-10 blur transition-opacity duration-300"
                         :class="passwordFocused ? 'opacity-20' : 'opacity-0'"></div>
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600 flex items-center animate-pulse">
                        <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Remember me --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input wire:model="remember" 
                           id="remember-me" 
                           type="checkbox" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-colors duration-200">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-700 hover:text-blue-600 transition-colors duration-200 cursor-pointer">
                        Se souvenir de moi
                    </label>
                </div>
                <a href="#" class="text-sm text-blue-600 hover:text-blue-500 transition-colors duration-200">
                    Mot de passe oublié ?
                </a>
            </div>

            {{-- Bouton de connexion --}}
            <button type="submit" 
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:scale-105 active:scale-95 transition-all duration-200 shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
                    :disabled="isSubmitting"
                    wire:loading.attr="disabled">
                
                {{-- Spinner de chargement --}}
                <div wire:loading class="absolute left-3 flex items-center">
                    <svg class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                
                <span wire:loading.remove>Se connecter</span>
                <span wire:loading>Connexion...</span>
                
                {{-- Icône de flèche --}}
                <svg wire:loading.remove class="ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </button>
        </form>

        {{-- Footer --}}
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Pas encore de compte ? 
                <a href="/register" class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200">
                    Créer un compte
                </a>
            </p>
        </div>
    </div>
</div>
