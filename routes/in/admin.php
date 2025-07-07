<?php

use App\Livewire\Admin\Customer\CustomerActions;
use App\Livewire\Admin\Customer\CustomerManager;
use App\Livewire\Admin\Customer\CustomerShow;
use App\Livewire\Admin\DashbRolesPerms;
use App\Livewire\Admin\User\PermissionManagement;
use App\Livewire\Admin\User\RoleManagement;
use App\Livewire\Admin\User\UserForm;
use App\Livewire\Admin\User\UserManagement;
use App\Livewire\Admin\User\UserRoleAssignment;
use App\Livewire\Admin\WarehouseManager;
use App\Livewire\Customer\CustomerDashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('clients', CustomerManager::class)->name('customers');
    Route::get('clients/inscription', CustomerActions::class)->name('customer-actions');
    Route::get('client/{customer}', CustomerShow::class)->name('customer.show');
    Route::get('ventes', WarehouseManager::class)->name('ventes');
    Route::get('magasins', WarehouseManager::class)->name('warehouses');
    Route::get('utilisateurs', UserManagement::class)->name('users');

    Route::get('utilisateurs/creation', UserForm::class)->name('users.create');
    Route::get('utilisateurs/edition/{user}', UserForm::class)->name('users.edit');
});

/* Roles - Permissions - Assign... */
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('attribution-roles-permissions', DashbRolesPerms::class)->name('dashbrolesperms');

    Route::get('/users', UserManagement::class)->name('users');
    
    /* Route::get('/roles', function () {
        return view('roles');
    })->name('roles'); */
    Route::get('/roles', RoleManagement::class)->name('roles');
    
    /* Route::get('/permissions', function () {
        return view('permissions');
    })->name('permissions'); */
    Route::get('/permissions', PermissionManagement::class)->name('permissions');
    
    /* Route::get('/user-roles', function () {
        return view('user-roles');
    })->name('user-roles'); */
    Route::get('/user-roles', UserRoleAssignment::class)->name('user-roles');
});


