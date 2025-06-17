<?php

namespace App\Livewire\Admin\Customer;

use App\Models\Customer;
use App\Models\LoyaltyCard;
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
    public $countryCode = '+221';
    public $full_mobile_phone = '';
    public $mobile_phone = '';
    public $fixed_phone = '';
    public $magasin_reception = '';
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

    public function completePhoneNumber()
    {
        $this->full_mobile_phone = "221"+$this->mobile_phone;
    }
    
    protected $rules = [
        'civility'          => 'required',
        'lastname'          => 'required|min:2',
        'firstname'         => 'required|min:2',
        'mobile_phone'      => 'required|unique:customers,mobile_phone|digits:12',
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
        $this->validate();
        //dd($this->mobile_phone);
        //$this->mobile_phone = $this->countryCode .''. $this->mobile_phone;

        $customer = Customer::create([
            'civility'  =>  $this->civility,
            'lastname'  =>  $this->lastname,
            'firstname'  =>  $this->firstname,
            //'mobile_phone'  =>  '+221'.''.$this->mobile_phone,
            'mobile_phone'  =>  $this->mobile_phone,
            'address'  =>  $this->address,
            'city'  =>  $this->city,
            'email'  =>  $this->email,
            'birthdate'  =>  $this->birthdate,
            'birthplace'  =>  $this->birthplace,
            'fixed_phone'  =>  $this->fixed_phone,  // ? '+221'.''.$this->fixed_phone : '',
            'magasin_reception'  =>  $this->magasin_reception,
            'description'  =>  $this->description,
            'user_id'  =>  Auth::user()->id,
        ]);

        LoyaltyCard::create([
            'customer_id'  =>  $customer->id,
            'balance'  =>  $this->balance,
            'card_number'  =>  $this->card_number,
        ]);
        
        session()->flash('message', 'Inscription réussie !');

        return $this->redirect('/admin/clients', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.customer.customer-actions');
    }
}
