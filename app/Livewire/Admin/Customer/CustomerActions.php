<?php

namespace App\Livewire\Admin\Customer;

use App\Models\Customer;
use App\Models\LoyaltyCard;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerActions extends Component
{
    // Informations client
    public $civility = '';
    public $lastname = '';
    public $firstname = '';
    public $birthplace = '';
    public $birthdate = '';
    public $address = '';
    public $city = '';
    public $email = '';
    public $country_code = '';
    public $phone_full = '';
    public $mobile_phone = '';
    public $fixed_phone = '';
    public $magasin_reception = '';
    public $selectedMagasin = '';
    public $description = '';

    // Informations carte de fidélité
    public $card_number = '';
    public $balance = 0;   // solde
    public $barcode = '';

    public function mount ()
    {
        // Générer des valeurs par défaut pour la carte
        $this->card_number = $this->generateCardNumber();
        $this->barcode = $this->generateBarcode();
    }
    protected function generateCardNumber()
    {
        return 'CART' . now()->format('Ymd') . rand(1000, 9999);
    }

    protected function generateBarcode()
    {
        return rand(10000000, 99999999);
    }
    
    protected $rules = [
        'civility'          => 'required',
        'lastname'          => 'required|min:2',
        'firstname'         => 'required|min:2',
        //'mobile_phone'      => 'required|unique:customers,mobile_phone',
        'phone_full'      => 'required|unique:customers,mobile_phone',
        'fixed_phone'      => 'nullable|unique:customers|digits:12',
        'address'           => 'required',
        'city'             => 'required',
        'email'             => 'nullable|email|max:255',
        'birthdate'         => 'nullable|date',
        'birthplace'        => 'nullable',
        // Règles carte
        'card_number' => 'required|min:10',
        //'balance' => 'numeric|min:0',   // solde
        //'barcode' => 'required|min:8',
    ];

    public function inscription()
    {
        //dd($this->mobile_phone);
        //dd($this->phone_full);
        $this->validate();

        $customer = Customer::create([
            'civility'  =>  $this->civility,
            'lastname'  =>  $this->lastname,
            'firstname'  =>  $this->firstname,
            //'mobile_phone'  =>  $this->mobile_phone,
            'mobile_phone'  =>  $this->phone_full,
            'address'  =>  $this->address,
            'city'  =>  $this->city,
            'email'  =>  $this->email,
            'birthdate'  =>  $this->birthdate,
            'birthplace'  =>  $this->birthplace,
            'fixed_phone'  =>  $this->fixed_phone,
            //'magasin_reception'  =>  $this->magasin_reception,
            'magasin_reception'  =>  $this->selectedMagasin,
            'description'  =>  $this->description,
            'user_id'  =>  Auth::user()->id,
        ]);

        LoyaltyCard::create([
            'customer_id'  =>  $customer->id,
            'balance'  =>  $this->balance,
            'card_number'  =>  $this->card_number,
        ]);
        
        session()->flash('message', 'Inscription réussie !');
        $this->dispatch('loadCustomers');

        return $this->redirect('/admin/clients', navigate: true);
    }

    public function render()
    {
        /* if($this->selectedMagasin) {
        $m = Warehouse::where('id', '=', $this->selectedMagasin)->first();
        $this->show_name = $m->name;
        } else {
        $this->selectedMagasin = null;
        $this->show_name = null;
        } */
        return view('livewire.admin.customer.customer-actions');
    }

}
