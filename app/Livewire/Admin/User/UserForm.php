<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserForm extends Component
{
    public $userId = null;
    public $isEditing = false;
    
    // Informations utilisateur
    public $civility = '';
    public $lastname = '';
    public $firstname = '';
    public $matricule = '';
    public $date_naissance = '';
    public $address = '';
    public $ville = '';
    public $email = '';
    public $mobile_phone = '';
    public $telephone_fixe = '';
    public $password = '';
    public $password_confirmation = '';
    public $description = '';

    protected $rules = [
        'civility' => 'required',
        'lastname' => 'required|min:2|max:50',
        'firstname' => 'required|min:2|max:80',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $this->userId = $id;
            $this->isEditing = true;
            $this->loadUserData();
        } else {
            $this->generateMatricule();
        }
    }

    protected function loadUserData()
    {
        $user = User::findOrFail($this->userId);
        
        $this->civility = $user->civility;
        $this->lastname = $user->lastname;
        $this->firstname = $user->firstname;
        $this->matricule = $user->matricule;
        $this->date_naissance = $user->date_naissance;
        $this->address = $user->address;
        $this->ville = $user->ville;
        $this->email = $user->email;
        $this->mobile_phone = $user->mobile_phone;
        $this->telephone_fixe = $user->telephone_fixe;
        $this->description = $user->description;
    }

    protected function generateMatricule()
    {
        $this->matricule = 'EMP' . now()->format('Ym') . strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
    }

    public function generateNewMatricule()
    {
        $this->generateMatricule();
    }

    public function submit()
    {
        $rules = $this->rules;
        
        if ($this->isEditing) {
            $rules['email'] = 'required|email|unique:users,email,' . $this->userId;
            $rules['password'] = 'nullable|min:8|confirmed';
        }

        $this->validate($rules);

        $userData = [
            'civility' => $this->civility,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'matricule' => $this->matricule,
            'date_naissance' => $this->date_naissance,
            'address' => $this->address,
            'ville' => $this->ville,
            'email' => $this->email,
            'mobile_phone' => $this->mobile_phone,
            'telephone_fixe' => $this->telephone_fixe,
            'description' => $this->description,
        ];

        if (!empty($this->password)) {
            $userData['password'] = Hash::make($this->password);
        }

        if ($this->isEditing) {
            $user = User::findOrFail($this->userId);
            $user->update($userData);
        } else {
            User::create($userData);
        }

        $message = $this->isEditing 
            ? 'Utilisateur mis à jour avec succès !' 
            : 'Utilisateur créé avec succès !';

        session()->flash('message', $message);
        
        if (!$this->isEditing) {
            return redirect()->route('admin.users');
        }
    }

    public function render()
    {
        return view('livewire.admin.user.user-form');
    }
}
