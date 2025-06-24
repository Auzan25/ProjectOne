<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'civility',     
        'lastname',
        'firstname',
        'mobile_phone',
        'fixed_phone',
        'address',
        'city',
        'email',
        'birthdate',
        'birthplace',  
        'user_id',
        'magasin_reception',
        'description',
    ];

    public function agentName()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFullName()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function scopeSearch($query, $value)
    {
        $query->where('firstname', 'like', "%{$value}%")->orWhere('lastname', 'like', "%{$value}%");
    }

    public function loyaltyCard()
    {
        return $this->hasOne(LoyaltyCard::class);
    }
    /* case many */
    /* public function loyaltyCards()
    {
        return $this->hasMany(LoyaltyCard::class);
    } */
}
