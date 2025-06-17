<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard CRM Auchan</h1>
    
    <!-- Cards Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Clients -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
            <h3 class="text-gray-500 text-sm font-medium">Total Clients</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalClients }}</p>
            <div class="mt-2 flex items-center text-sm text-gray-600">
                <span class="mr-2">{{ round(($clientsAvecCarte/$totalClients)*100) }}% avec carte</span>
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
            </div>
        </div>

        <!-- Carte fidélité -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
            <h3 class="text-gray-500 text-sm font-medium">Clients avec carte</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $clientsAvecCarte }}</p>
            <div class="mt-2 text-sm text-gray-600">
                <span>{{ $clientsSansCarte }} sans carte</span>
            </div>
        </div>

        <!-- Magasins -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
            <h3 class="text-gray-500 text-sm font-medium">Magasins</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalMagasins }}</p>
        </div>

        <!-- Produits -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
            <h3 class="text-gray-500 text-sm font-medium">Produits</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalProduits }}</p>
            <div class="mt-2 text-sm text-gray-600">
                <span>{{ $produitsAuchan }} Auchan</span> • 
                <span>{{ $autresProduits }} Autres</span>
            </div>
        </div>

        <!-- Utilisateurs -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
            <h3 class="text-gray-500 text-sm font-medium">Utilisateurs</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalUtilisateurs }}</p>
        </div>

        <!-- Ventes -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-indigo-500">
            <h3 class="text-gray-500 text-sm font-medium">Ventes</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalVentes }}</p>
        </div>
    </div>

    <!-- Graphiques -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Ventes mensuelles -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Ventes mensuelles</h3>
            <canvas id="ventesChart" class="w-full h-64"></canvas>
        </div>

        <!-- Produits populaires -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Top 5 produits</h3>
            <div class="space-y-4">
                @foreach($produitsPopulaires as $produit)
                <div class="flex items-center">
                    <div class="w-2/3">
                        <p class="text-sm font-medium text-gray-800">{{ $produit->nom }}</p>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" 
                                 style="width: {{ ($produit->ventes_count / $totalVentes) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="w-1/3 text-right">
                        <p class="text-sm font-bold text-gray-800">{{ $produit->ventes_count }} ventes</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Dernières activités -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Activités récentes</h3>
        <!-- Implémentez ici la liste des activités récentes -->
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:load', function() {
        // Graphique des ventes mensuelles
        const ventesCtx = document.getElementById('ventesChart').getContext('2d');
        const ventesChart = new Chart(ventesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Ventes mensuelles',
                    data: @json($ventesMensuelles),
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush