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


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Total Clients --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Clients</p>
                    {{-- <p class="text-2xl font-bold text-gray-900 mt-1">{{ $this->totalClients }}</p> --}}
                    <p class="text-2xl font-bold text-gray-900 mt-1">122</p>
                    <div class="flex items-center mt-2">
                        <span class="text-sm text-green-600">
                            <i class="fas fa-arrow-up mr-1"></i>
                            12%
                        </span>
                        <span class="text-gray-500 text-xs ml-2">vs mois dernier</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-white text-lg"></i>
                </div>
            </div>
        </div>

        {{-- Projets Actifs --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Projets Actifs</p>
                    {{-- <p class="text-2xl font-bold text-gray-900 mt-1">{{ $this->activeProjects }}</p> --}}
                    <p class="text-2xl font-bold text-gray-900 mt-1">31</p>
                    <div class="flex items-center mt-2">
                        <span class="text-sm text-green-600">
                            <i class="fas fa-arrow-up mr-1"></i>
                            8%
                        </span>
                        <span class="text-gray-500 text-xs ml-2">vs mois dernier</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-briefcase text-white text-lg"></i>
                </div>
            </div>
        </div>

        {{-- Chiffre d'Affaires --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">CA Mensuel</p>
                    {{-- <p class="text-2xl font-bold text-gray-900 mt-1">{{ number_format($this->monthlyRevenue, 0, ',', ' ') }}€</p> --}}
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ number_format(45000000, 0, ',', ' ') }}F</p>
                    <div class="flex items-center mt-2">
                        <span class="text-sm text-green-600">
                            <i class="fas fa-arrow-up mr-1"></i>
                            15%
                        </span>
                        <span class="text-gray-500 text-xs ml-2">vs mois dernier</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-yellow-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-euro-sign text-white text-lg"></i>
                </div>
            </div>
        </div>

        {{-- Factures en Attente --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Factures en Attente</p>
                    {{-- <p class="text-2xl font-bold text-gray-900 mt-1">{{ $this->pendingInvoices }}</p> --}}
                    <p class="text-2xl font-bold text-gray-900 mt-1">70</p>
                    <div class="flex items-center mt-2">
                        <span class="text-sm text-red-600">
                            <i class="fas fa-arrow-down mr-1"></i>
                            3%
                        </span>
                        <span class="text-gray-500 text-xs ml-2">vs mois dernier</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-file-invoice text-white text-lg"></i>
                </div>
            </div>
        </div>
    </div>




    <!-- Charts -->
    <livewire:admin.stats.customers-chart>

    <div class="flex justify-center items-center min-h-[50vh] px-4 py-12">
    <!-- Centered Card Container -->
        <div class="w-full max-w-2xl bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
            <!-- Card Header -->
            <div class="bg-indigo-50 px-6 py-4 border-b border-gray-100 text-center">
                <h2 class="text-2xl font-semibold text-gray-800">Title</h2>
            </div>
            
            <!-- Card Body - Single Column -->
            <div class="p-8">
                <div class="flex flex-col items-center text-center space-y-6">
                    <!-- Icon Section -->
                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-full p-4">
                        <svg class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>

                    <div id="piechart2" style="width: 900px; height: 500px;"></div>
                    
                    <!-- Content -->
                    <h3 class="text-xl font-medium text-gray-700">Key Benefits</h3>
                    
                    <p class="text-gray-600">
                        Discover how our solution can transform your workflow with these powerful features.
                    </p>
                    
                    <!-- Features List -->
                    <ul class="space-y-3 w-full max-w-md">
                        <li class="flex items-center justify-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">Easy to implement and use</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">Responsive design for all devices</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">Customizable to your needs</span>
                        </li>
                    </ul>
                    
                    <!-- CTA Button -->
                    <button wire:click="learnMore" class="mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                        Get Started Now
                    </button>
                </div>
            </div>
        </div>
    </div>



    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 my-8">
    <!-- Card Container -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
        <!-- Card Header with Soft Color -->
        {{-- <div class="{{ $headerColor }} px-6 py-4 border-b border-gray-100"> --}}
        <div class="bg-indigo-50 px-6 py-4 border-b border-gray-100">
            {{-- <h2 class="text-2xl font-semibold text-gray-800">{{ $cardTitle }}</h2> --}}
            <h2 class="text-2xl font-semibold text-gray-800">Title</h2>
        </div>
        
        <!-- Card Body - Two Columns -->
        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Left Column -->
                <div class="w-full md:w-1/2">
                    <h3 class="text-xl font-medium text-gray-700 mb-3">Key Benefits</h3>
                    <p class="text-gray-600 mb-4">
                        Discover how our solution can transform your workflow with these powerful features.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">Easy to implement and use</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">Responsive design for all devices</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">Customizable to your needs</span>
                        </li>
                    </ul>
                    <button wire:click="learnMore" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 shadow-sm hover:shadow-md">
                        Get Started
                    </button>
                </div>
                
                <!-- Right Column -->
                <div class="w-full md:w-1/2">
                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-lg overflow-hidden aspect-video flex items-center justify-center p-4">
                        <div class="text-center">
                            <svg class="h-12 w-12 text-indigo-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-indigo-600 font-medium">Interactive Demo Preview</p>
                            <p class="text-gray-500 text-sm mt-1">Hover over elements to see them in action</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    <div class="container mx-auto px-4 py-12">
    <!-- Header Section with Title -->
    <div class="text-center mb-12">
        {{-- <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ $sectionTitle }}</h2> --}}
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Title Here</h2>
        <div class="w-20 h-1 bg-blue-600 mx-auto"></div> <!-- Decorative line -->
    </div>
    
    <!-- Two Column Content -->
    <div class="flex flex-col lg:flex-row gap-8 items-center">
        <!-- Left Column -->
        <div class="w-full lg:w-1/2">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Left Column Subtitle</h3>
            <p class="text-gray-600 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            
            <button wire:click="someAction" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition duration-300">
                Learn More
            </button>
        </div>
        
        <!-- Right Column -->
        <div class="w-full lg:w-1/2">
            <div class="bg-gray-100 rounded-lg overflow-hidden aspect-video flex items-center justify-center">
                <span class="text-gray-500">Image or Content Placeholder</span>
            </div>
        </div>
    </div>
</div>


</div>




<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    var data = google.visualization.arrayToDataTable(@json($customerChartData));

    var options = {
        title: 'My Daily Activities'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

    chart.draw(data, options);
    }
</script>