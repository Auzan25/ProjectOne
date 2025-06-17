<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Mon tableau de bord</flux:heading>
        <flux:subheading size="lg" class="mb-6">Gérer votre profil et paramètre du compte.</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="container mx-auto px-4 py-6">
    {{-- <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard CRM Auchan</h1> --}}
    
    <!-- Cards Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Clients -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
            <h3 class="text-gray-500 text-sm font-medium">Clients Cartés</h3>
            <p class="text-3xl font-bold text-gray-800">00</p>
            <div class="mt-2 flex items-center text-sm text-gray-600">
                <span class="mr-2">00</span>
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
            </div>
        </div>

        <!-- Produits -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
            <h3 class="text-gray-500 text-sm font-medium">Produits</h3>
            <p class="text-3xl font-bold text-gray-800">00{{-- {{ $totalProduits }} --}}</p>
            <div class="mt-2 text-sm text-gray-600">
                <span>{{-- {{ $produitsAuchan }} --}}5 Auchan</span> • 
                <span>{{-- {{ $autresProduits }} --}}11 Autres</span>
            </div>
        </div>

        <!-- Magasins -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
            <h3 class="text-gray-500 text-sm font-medium">Magasins</h3>
            <p class="text-3xl font-bold text-gray-800">00</p>
        </div>
    </div>

</div>
