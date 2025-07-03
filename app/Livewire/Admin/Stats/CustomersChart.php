<?php

namespace App\Livewire\Admin\Stats;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CustomersChart extends Component
{
    public $headerColor = "bg-indigo-50 ";
    public $cardTitle = "Chart - Graphique ";
    public $customerChartData;

    public function mount()
    {
        $customers = Customer::select(DB::raw("created_at as month"), DB::raw("COUNT (*) as compteur"))
                        ->groupBy('month')
                        ->orderBy("month", "ASC")
                        ->get();

        $customerData = [
            ["Mois", "Compteur"]
        ];

        foreach ($customers as $key => $customer) {
            $customerData[] = [$customer->month, (int) $customer->compteur];
        }

        $this->customerChartData = $customerData;
    }

    public function render()
    {
        return view('livewire.admin.stats.customers-chart');
    }
}
