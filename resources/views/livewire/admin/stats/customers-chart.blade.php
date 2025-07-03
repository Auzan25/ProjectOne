<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- En-tête de la carte -->
        <div class="bg-indigo-50 px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">{{ $cardTitle }}</h2>
        </div>
        
        <!-- Conteneur du graphique -->
        <div class="p-4">
            <div id="piechart" style="height: 400px;"></div>
        </div>
    </div>
</div>

@script
<script>
    let chart;
    let isInitialized = false;

    // Initialisation lors du premier chargement
    document.addEventListener('livewire:init', () => {
        initChart();
    });

    // Réinitialisation après navigation
    document.addEventListener('livewire:navigated', () => {
        if (!isInitialized) {
            initChart();
        } else {
            drawChart();
        }
    });

    function initChart() {
        if (typeof google === 'undefined') {
            // Chargement asynchrone de Google Charts
            const script = document.createElement('script');
            script.src = 'https://www.gstatic.com/charts/loader.js';
            script.onload = () => {
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(() => {
                    isInitialized = true;
                    drawChart();
                });
            };
            document.head.appendChild(script);
        } else if (typeof google.visualization === 'undefined') {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(() => {
                isInitialized = true;
                drawChart();
            });
        } else {
            isInitialized = true;
            drawChart();
        }
    }

    function drawChart() {
        if (!isInitialized || typeof google === 'undefined') return;

        const data = google.visualization.arrayToDataTable(@js($customerChartData));

        const options = {
            title: 'Activités quotidiennes',
            pieHole: 0.4,
            chartArea: {
                left: 20,
                top: 20,
                width: '90%',
                height: '80%'
            },
            legend: {
                position: 'labeled'
            },
            backgroundColor: 'transparent'
        };

        const container = document.getElementById('piechart');
        
        // Nettoyer l'ancien graphique si existe
        if (chart) {
            chart.clearChart();
        }
        
        try {
            chart = new google.visualization.PieChart(container);
            chart.draw(data, options);
        } catch (error) {
            console.error("Erreur de rendu du graphique:", error);
            // Réessayer après un délai
            setTimeout(drawChart, 300);
        }
    }

    // Redimensionnement responsive
    window.addEventListener('resize', () => {
        if (chart) {
            drawChart();
        }
    });
</script>
@endscript