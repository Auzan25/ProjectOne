<?php

namespace App\Livewire\Admin\Customer;

use App\Models\Customer;
use Livewire\Attributes\On;
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
    public $balance;

    public function mount()
    {
        $this->getCustomerData();
    }

    #[On('reloadCardData')]
    public function reloadCardData()
    {
        $this->getCustomerData();
    }

    public function render()
    {
        return view('livewire.admin.customer.customer-show');
    }

    public function getCustomerData()
    {
        $customerData = Customer::with('loyaltyCard')->find($this->customer);
        //dd($customerData);
        $this->customerId = $customerData->id;
        $this->civility = $customerData->civility;
        $this->lastname = $customerData->lastname;
        $this->firstname = $customerData->firstname;
        $this->birthplace = $customerData->birthplace;
        $this->birthdate = $customerData->birthdate;
        $this->address = $customerData->address;
        $this->city = $customerData->city;
        $this->email = $customerData->email;
        $this->mobile_phone = $customerData->mobile_phone;
        $this->fixed_phone = $customerData->fixed_phone;
        $this->magasin_reception = $customerData->magasin_reception;
        $this->description = $customerData->description;
        $this->created_at = $customerData->created_at;
        $this->updated_at = $customerData->updated_at;
        $this->agentName = $customerData->agentName;
        /* card */
        $this->balance = $customerData->loyaltyCard->balance;
    }
}
