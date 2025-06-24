<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'créer clients']); // nouveau client
        Permission::create(['name' => 'editer clients']);
        Permission::create(['name' => 'suppimer clients']);
        Permission::create(['name' => 'editer carte']);
        Permission::create(['name' => 'publish clients']);
        Permission::create(['name' => 'unpublish clients']);
        
        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create roles and assign created permissions

        // Exemple de rôle et assignation
        $role = Role::create(['name' => 'crm_manager']);
        $role->givePermissionTo(['client.*', 'loyalty.*', 'ticket.view', 'ticket.assign']);

        // this can be done as separate statements
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        /* NOTES */
        //Analyste Marketing / Data Analyst
        //Accède aux tableaux de bord, analyse les performances des campagnes, propose des optimisations.

        /* Responsable CRM / Responsable Fidélisation
        Accès complet aux données clients, y compris :
        Fiche client
        Historique d’achat
        Cartes de fidélité */
    }
}
