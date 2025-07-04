<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CustomerDashboard extends Component
{
    public $customerChartData;

    public function mount()
    {
        /* SQLite doesn't have a DATE_FORMAT function - that's a MySQL function. */
        //$customers = Customer::select(DB::raw("DATE_FORMAT('created_at', '%m-%Y') as month"), DB::raw("COUNT (*) as compteur"))
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
        return view('livewire.customer.customer-dashboard');
    }
}
