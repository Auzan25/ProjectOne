<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'civility',
        'firstname',
        'lastname',
        'pseudo',
        'sexe',
        'mobile_phone',
        'fixed_phone',
        'email',
        'email_verified_at',
        'password',
        'birthdate',
        'birthplace',
        'address',
        'city',
        'magasin_reception',
        'description',
        'is_active',
        'user_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate' => 'date',
        'is_active' => 'boolean',
        'user_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accesseurs
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getInitialsAttribute()
    {
        return strtoupper(substr($this->firstname, 0, 1) . substr($this->lastname, 0, 1));
    }

    public function getFormattedBirthdateAttribute()
    {
        return $this->birthdate ? $this->birthdate->format('d/m/Y') : null;
    }

    public function getAgeAttribute()
    {
        return $this->birthdate ? $this->birthdate->diffInYears(now()) : null;
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    public function scopeWithMagasin($query)
    {
        return $query->whereNotNull('magasin_reception');
    }

    public function scopeWithoutMagasin($query)
    {
        return $query->whereNull('magasin_reception');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->whereRaw("CONCAT(firstname, ' ', lastname) LIKE ?", ["%{$search}%"])
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('mobile_phone', 'like', "%{$search}%")
              ->orWhere('fixed_phone', 'like', "%{$search}%")
              ->orWhere('pseudo', 'like', "%{$search}%")
              ->orWhere('city', 'like', "%{$search}%");
        });
    }

    public function scopeByMagasin($query, $magasin)
    {
        if ($magasin === 'with_magasin') {
            return $query->whereNotNull('magasin_reception');
        } elseif ($magasin === 'without_magasin') {
            return $query->whereNull('magasin_reception');
        }
        
        return $query->where('magasin_reception', $magasin);
    }

    // Relations
    //public function user()
    public function agentName()
    {
        return $this->belongsTo(User::class, 'user_id');
        //return $this->belongsTo(User::class);
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

    // Méthodes utilitaires
    public function getStatusBadgeAttribute()
    {
        return $this->is_active 
            ? '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Actif</span>'
            : '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Inactif</span>';
    }

    public function getMagasinBadgeAttribute()
    {
        return $this->magasin_reception
            ? '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">' . $this->magasin_reception . '</span>'
            : '<span class="text-gray-400">Non défini</span>';
    }

    // Méthodes de validation
    public static function getValidationRules()
    {
        return [
            'civility' => 'required|string|in:Monsieur,Madame',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'pseudo' => 'nullable|string|max:255',
            'sexe' => 'nullable|in:masculin,feminin',
            'mobile_phone' => 'required|string|unique:customers,mobile_phone|regex:/^\+221[0-9]{9}$/',
            'fixed_phone' => 'nullable|string|regex:/^\+221[0-9]{8}$/',
            'email' => 'nullable|email|unique:customers,email',
            'password' => 'required|string|min:8',
            'birthdate' => 'nullable|date|before:today',
            'birthplace' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'magasin_reception' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
