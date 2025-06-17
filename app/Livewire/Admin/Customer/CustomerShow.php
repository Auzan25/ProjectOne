<?php

namespace App\Livewire\Admin\Customer;

use App\Models\Customer;
use Livewire\Component;

class CustomerShow extends Component
{
    public $customer;
    //public Customer $customer;
    
    public $balanceVisible = true;
    public $activeSection = 'info';
    public $activeTab = 'info';
    protected $listeners = ['balanceUpdated' => 'refreshBalance'];

    public function refreshBalance()
    {
        $this->customer->refresh();
    }

    public function toggleBalance()
    {
        $this->balanceVisible = !$this->balanceVisible;
    }

    public function changeTab($tab)
    {
        $this->activeTab = $tab;
    }

    public $customerId = '';
    public $civility = '';
    public $lastname = '';
    public $firstname = '';
    public $birthplace = '';
    public $birthdate = '';
    public $address = '';
    public $city = '';
    public $email = '';
    public $mobile_phone = '';
    public $fixed_phone = '';
    public $magasin_reception = '';
    public $description = '';
    public $created_at, $updated_at;
    public $agentName;

    public function mount()
    {
        $this->getCustomerData();
    }

    public function render()
    {
        return view('livewire.admin.customer.customer-show');
    }

    public function getCustomerData()
    {
        $customer = Customer::find($this->customer);
        $this->customerId = $customer->id;
        $this->civility = $customer->civility;
        $this->lastname = $customer->lastname;
        $this->firstname = $customer->firstname;
        $this->birthplace = $customer->birthplace;
        $this->birthdate = $customer->birthdate;
        $this->address = $customer->address;
        $this->city = $customer->city;
        $this->email = $customer->email;
        $this->mobile_phone = $customer->mobile_phone;
        $this->fixed_phone = $customer->fixed_phone;
        $this->magasin_reception = $customer->magasin_reception;
        $this->description = $customer->description;
        $this->created_at = $customer->created_at;
        $this->updated_at = $customer->updated_at;
        $this->agentName = $customer->agentName;
    }
}
