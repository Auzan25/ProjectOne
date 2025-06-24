<?php

namespace App\Livewire\Admin\Customer;

use App\Models\Customer;
use App\Models\LoyaltyCard;
use Flux\Flux;
use Livewire\Component;

class AccountActions extends Component
{
    public $customerId;
    public $customer;
    public $balance;

    public function mount()
    {
        $this->customer = \App\Models\Customer::with('loyaltyCard')->find($this->customerId);
        $this->balance =  $this->customer->loyaltyCard->balance;
        //dd($this->customer);
    }
    public function render()
    {
        //dd($this->customerId);
        //$customer = \App\Models\Customer::with('loyaltyCard')->find($this->customerId);
        //dd($customer);
        return view('livewire.admin.customer.account-actions');
        //return view('livewire.admin.customer.account-actions', compact('customer'));
    }

    public function updateBalance()
    {
        /* Customer::with('loyaltyCard')->where('id', $this->customerId)->update([
            'balance'=> $this->balance,
        ]); */
        LoyaltyCard::where('customer_id', $this->customerId)->update([
            'balance'=> $this->balance,
        ]);
        $this->dispatch('reloadCardData'); // to parent - TaskIndex
        session()->flash('success', 'Le solde a été bien mis à jour.');
        $this->reset('balance');
        $this->dispatch('notify', [
                'text' => 'Le solde a été bien mis à jour.',
                'type' => 'success',
                'status' => ''
            ]);
        Flux::modal('edit-card')->close();
        $this->mount();
    }
}
