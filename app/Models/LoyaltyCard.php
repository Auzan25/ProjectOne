<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoyaltyCard extends Model
{
    protected $fillable = [
        'customer_id',
        'balance',
        'card_number',
        'barcode'
    ];

    public function customer ()
    {
        return $this->belongsTo(Customer::class);
    }
}
