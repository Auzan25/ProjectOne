<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // List of permissions
        $permissions = [
            // Clients
            'client.view',
            'client.create',
            'client.edit',
            'client.delete',

            // Historique achats
            'purchase.view',

            // Tickets
            'ticket.view',
            'ticket.create',
            'ticket.edit',
            'ticket.assign',
            'ticket.close',
            'ticket.delete',

            // Fidélité
            'loyalty.view',
            'loyalty.update_balance',
            'loyalty.assign_card',

            // Utilisateurs (admin only)
            'user.view',
            'user.manage_roles',
        ];

        // Create all permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles and their permissions
        $roles = [
            'admin' => Permission::all()->pluck('name')->toArray(),

            'crm_manager' => [
                'client.view', 'client.create', 'client.edit', 'client.delete',
                'purchase.view',
                'ticket.view', 'ticket.assign',
                'loyalty.view', 'loyalty.update_balance', 'loyalty.assign_card',
            ],

            'marketing_exec' => [
                'client.view',
                'purchase.view',
                'loyalty.view',
            ],

            'data_analyst' => [
                'client.view',
                'purchase.view',
                'loyalty.view',
                'ticket.view',
            ],

            'support_agent' => [
                'ticket.view', 'ticket.create', 'ticket.edit', 'ticket.close',
                'client.view',
                'loyalty.view', 'loyalty.update_balance',
            ],

            'support_manager' => [
                'ticket.view', 'ticket.create', 'ticket.edit', 'ticket.close',
                'ticket.assign', 'ticket.delete',
                'client.view',
                'loyalty.view', 'loyalty.update_balance',
            ],

            'dev' => [], // No CRM access, handled via gates or elsewhere

            'auditor' => [
                'client.view',
                'purchase.view',
                'ticket.view',
                'loyalty.view',
            ],
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

        echo "✅ Rôles et permissions CRM générés avec succès.\n";
    }
}
