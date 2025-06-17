<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dashboard', [
            'totalClients' => Client::count(),
            'clientsAvecCarte' => Client::whereHas('cartesFidelite')->count(),
            'clientsSansCarte' => Client::doesntHave('cartesFidelite')->count(),
            'totalMagasins' => Magasin::count(),
            'totalProduits' => Produit::count(),
            'produitsAuchan' => Produit::where('marque', 'Auchan')->count(),
            'autresProduits' => Produit::where('marque', '!=', 'Auchan')->count(),
            'totalUtilisateurs' => User::count(),
            'totalVentes' => Vente::count(),
            'ventesMensuelles' => $this->getVentesMensuelles(),
            'produitsPopulaires' => $this->getProduitsPopulaires(),
        ]);
    }

    protected function getVentesMensuelles()
    {
        // Implémentez la logique pour récupérer les ventes mensuelles
        return Vente::selectRaw('MONTH(created_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->mois => $item->total];
            });
    }

    protected function getProduitsPopulaires()
    {
        // Implémentez la logique pour récupérer les produits les plus vendus
        return Produit::withCount('ventes')
            ->orderByDesc('ventes_count')
            ->limit(5)
            ->get();
    }
    
}
