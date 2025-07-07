<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50">
    {{-- Header avec animations --}}
    <div class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Titre et navigation --}}
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <button onclick="history.back()" 
                            class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-2 border border-gray-300 rounded-md text-xs sm:text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:text-gray-900 transition-all duration-200 hover:scale-105">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour
                    </button>
                    
                    <div class="flex items-center">
                        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-1 sm:p-2 rounded-lg shadow-lg">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                            </svg>
                        </div>
                        <div class="ml-2 sm:ml-3">
                            <h1 class="text-lg sm:text-2xl font-bold text-gray-900 animate-fade-in whitespace-nowrap">
                                Gestion des Clients
                            </h1>
                            <p class="text-xs sm:text-sm text-gray-600 animate-fade-in-delay whitespace-nowrap">
                                {{ number_format($this->totalCustomers) }} clients
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Bouton Export --}}
                <button wire:click="exportCustomers"
                        class="inline-flex items-center px-2 py-1 sm:px-4 sm:py-2 bg-gradient-to-r from-green-600 to-blue-600 border border-transparent rounded-lg text-xs sm:text-sm font-medium text-white hover:from-green-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 hover:scale-105 shadow-lg">
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Exporter
                </button>
            </div>
        </div>
    </div>

    {{-- Statistiques --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-all duration-300 hover:scale-105">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Clients</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($this->totalCustomers) }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-all duration-300 hover:scale-105">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Clients Actifs</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($this->activeCustomers) }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-all duration-300 hover:scale-105">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-orange-100">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Clients Inactifs</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($this->inactiveCustomers) }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filtres et recherche --}}
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0 lg:space-x-4">
                {{-- Recherche --}}
                <div class="flex-1 max-w-lg">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input wire:model.live.debounce.300ms="search" 
                               type="text" 
                               class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="Rechercher par nom, email, téléphone...">
                    </div>
                </div>

                {{-- Filtres --}}
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                    <select wire:model.live="statusFilter"
                            class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        <option value="all">Tous les statuts</option>
                        <option value="active">Actifs</option>
                        <option value="inactive">Inactifs</option>
                    </select>

                    <select wire:model.live="magasinFilter"
                            class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        <option value="all">Tous les magasins</option>
                        <option value="with_magasin">Avec magasin</option>
                        <option value="without_magasin">Sans magasin</option>
                        @foreach($this->magasins as $magasin)
                            <option value="{{ $magasin }}">{{ $magasin }}</option>
                        @endforeach
                    </select>

                    <button wire:click="resetFilters"
                            class="px-4 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Réinitialiser
                    </button>
                </div>
            </div>
        </div>

        {{-- Tableau des clients --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <button wire:click="sortBy('firstname')" class="flex items-center space-x-1 hover:text-gray-900 transition-colors">
                                    <span>Client</span>
                                    @if($sortField === 'firstname')
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            @if($sortDirection === 'asc')
                                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L10 4.414 4.707 9.707a1 1 0 01-1.414 0z"/>
                                            @else
                                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L10 15.586l5.293-5.293a1 1 0 011.414 0z"/>
                                            @endif
                                        </svg>
                                    @endif
                                </button>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Contact
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <button wire:click="sortBy('city')" class="flex items-center space-x-1 hover:text-gray-900 transition-colors">
                                    <span>Ville</span>
                                    @if($sortField === 'city')
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            @if($sortDirection === 'asc')
                                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L10 4.414 4.707 9.707a1 1 0 01-1.414 0z"/>
                                            @else
                                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L10 15.586l5.293-5.293a1 1 0 011.414 0z"/>
                                            @endif
                                        </svg>
                                    @endif
                                </button>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Magasin
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <button wire:click="sortBy('is_active')" class="flex items-center space-x-1 hover:text-gray-900 transition-colors">
                                    <span>Statut</span>
                                    @if($sortField === 'is_active')
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            @if($sortDirection === 'asc')
                                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L10 4.414 4.707 9.707a1 1 0 01-1.414 0z"/>
                                            @else
                                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L10 15.586l5.293-5.293a1 1 0 011.414 0z"/>
                                            @endif
                                        </svg>
                                    @endif
                                </button>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <button wire:click="sortBy('created_at')" class="flex items-center space-x-1 hover:text-gray-900 transition-colors">
                                    <span>Date création</span>
                                    @if($sortField === 'created_at')
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            @if($sortDirection === 'asc')
                                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L10 4.414 4.707 9.707a1 1 0 01-1.414 0z"/>
                                            @else
                                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L10 15.586l5.293-5.293a1 1 0 011.414 0z"/>
                                            @endif
                                        </svg>
                                    @endif
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($this->customers as $customer)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-purple-600 flex items-center justify-center">
                                                <span class="text-sm font-medium text-white">
                                                    {{ strtoupper(substr($customer->firstname, 0, 1) . substr($customer->lastname, 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $customer->civility }} {{ $customer->firstname }} {{ $customer->lastname }}
                                            </div>
                                            @if($customer->pseudo)
                                                <div class="text-sm text-gray-500">{{ $customer->pseudo }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="space-y-1">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                            {{ $customer->mobile_phone }}
                                        </div>
                                        @if($customer->email)
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                                {{ $customer->email }}
                                            </div>
                                        @endif
                                        @if($customer->fixed_phone)
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                                </svg>
                                                {{ $customer->fixed_phone }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $customer->city }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if($customer->magasin_reception)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $customer->magasin_reception }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">Non défini</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($customer->is_active)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                            </svg>
                                            Actif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                                            </svg>
                                            Inactif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex flex-col">
                                        <span>{{ $customer->created_at->format('d/m/Y') }}</span>
                                        <span class="text-xs text-gray-400">{{ $customer->created_at->format('H:i') }}</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                        </svg>
                                        <div class="text-center">
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun client trouvé</h3>
                                            <p class="text-gray-500">Essayez de modifier vos critères de recherche ou ajoutez de nouveaux clients.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        @if($this->customers->hasPages())
            <div class="mt-8 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Affichage de {{ $this->customers->firstItem() }} à {{ $this->customers->lastItem() }} sur {{ $this->customers->total() }} résultats
                </div>
                <div class="flex items-center space-x-2">
                    {{ $this->customers->links() }}
                </div>
            </div>
        @endif
    </div>

    {{-- Loading States --}}
    <div wire:loading.flex wire:target="search,statusFilter,magasinFilter,sortBy" 
         class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 flex items-center space-x-3">
            <svg class="animate-spin h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-gray-700">Chargement...</span>
        </div>
    </div>

    {{-- Messages Flash --}}
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
             class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- Styles CSS personnalisés --}}
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes fade-in-delay {
            from { opacity: 0; transform: translateX(-10px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
        
        .animate-fade-in-delay {
            animation: fade-in-delay 0.8s ease-out 0.2s both;
        }
        
        /* Hover effects pour les lignes du tableau */
        tbody tr:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Animations pour les boutons */
        button:hover {
            transform: translateY(-1px);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        /* Styles pour les éléments de pagination */
        .pagination-wrapper nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .pagination-wrapper nav span,
        .pagination-wrapper nav a {
            @apply px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 hover:text-gray-700 transition-colors duration-200;
        }
        
        .pagination-wrapper nav span[aria-current="page"] {
            @apply bg-blue-600 text-white border-blue-600;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.875rem;
            }
            
            .table-responsive th,
            .table-responsive td {
                padding: 0.75rem 0.5rem;
            }
        }
    </style>
</div>

{{-- Scripts JavaScript pour les interactions --}}
<script>
    document.addEventListener('livewire:initialized', () => {
        // Gestion des raccourcis clavier
        document.addEventListener('keydown', (e) => {
            // Ctrl+F pour focus sur la recherche
            if (e.ctrlKey && e.key === 'f') {
                e.preventDefault();
                document.querySelector('input[wire\\:model\\.live\\.debounce\\.300ms="search"]').focus();
            }
            
            // Escape pour réinitialiser les filtres
            if (e.key === 'Escape') {
                @this.call('resetFilters');
            }
        });
        
        // Animation d'entrée pour les nouvelles lignes
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });
        
        document.querySelectorAll('tbody tr').forEach(row => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(20px)';
            row.style.transition = 'all 0.3s ease-out';
            observer.observe(row);
        });
        
        // Gestion des événements personnalisés
        Livewire.on('export-started', () => {
            console.log('Export démarré');
        });
    });
</script>