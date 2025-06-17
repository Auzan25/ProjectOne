<?php

use App\Livewire\Admin\Customer\CustomerManager;
use App\Livewire\Admin\WarehouseManager;
use App\Livewire\Customer\CustomerDashboard;
use App\Livewire\Faq;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/* Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard'); */
Route::get('dashboard', CustomerDashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('faqs', Faq::class)
    ->middleware(['auth', 'verified'])
    ->name('faq');

require __DIR__. '/in/admin.php';
require __DIR__.'/auth.php';
