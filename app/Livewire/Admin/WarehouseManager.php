<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;

class WarehouseManager extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public $search = '';

    #[Url(as: 'status')]
    public $statusFilter = 'all';

    #[Url(as: 'magasin')]
    public $magasinFilter = 'all';

    #[Url(as: 'sort')]
    public $sortField = 'created_at';

    #[Url(as: 'direction')]
    public $sortDirection = 'desc';

    public $perPage = 25;

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => 'all'],
        'magasinFilter' => ['except' => 'all'],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingMagasinFilter()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->statusFilter = 'all';
        $this->magasinFilter = 'all';
        $this->sortField = 'created_at';
        $this->sortDirection = 'desc';
        $this->resetPage();
    }

    public function exportCustomers()
    {
        // Logique d'export (CSV, Excel, etc.)
        $this->dispatch('export-started');
        
        // Ici vous pouvez ajouter votre logique d'export
        // Par exemple avec Laravel Excel ou un export CSV personnalisé
        
        session()->flash('success', 'Export en cours de traitement...');
    }

    #[Computed]
    public function customers()
    {
        $query = Customer::query();

        // Recherche globale
        if ($this->search) {
            $query->where(function ($q) {
                $q->whereRaw("CONCAT(firstname, ' ', lastname) LIKE ?", ['%' . $this->search . '%'])
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('mobile_phone', 'like', '%' . $this->search . '%')
                  ->orWhere('fixed_phone', 'like', '%' . $this->search . '%')
                  ->orWhere('pseudo', 'like', '%' . $this->search . '%')
                  ->orWhere('city', 'like', '%' . $this->search . '%');
            });
        }

        // Filtre par statut
        if ($this->statusFilter !== 'all') {
            $query->where('is_active', $this->statusFilter === 'active');
        }

        // Filtre par magasin
        if ($this->magasinFilter !== 'all') {
            if ($this->magasinFilter === 'with_magasin') {
                $query->whereNotNull('magasin_reception');
            } elseif ($this->magasinFilter === 'without_magasin') {
                $query->whereNull('magasin_reception');
            } else {
                $query->where('magasin_reception', $this->magasinFilter);
            }
        }

        // Tri
        $query->orderBy($this->sortField, $this->sortDirection);

        return $query->paginate($this->perPage);
    }

    #[Computed]
    public function magasins()
    {
        return Customer::whereNotNull('magasin_reception')
            ->distinct()
            ->pluck('magasin_reception')
            ->sort();
    }

    #[Computed]
    public function totalCustomers()
    {
        return Customer::count();
    }

    #[Computed]
    public function activeCustomers()
    {
        return Customer::where('is_active', true)->count();
    }

    #[Computed]
    public function inactiveCustomers()
    {
        return Customer::where('is_active', false)->count();
    }

    public function render()
    {
        return view('livewire.admin.warehouse-manager');
    }
}
