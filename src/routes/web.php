<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;
use App\Livewire\AddCar;
use App\Livewire\AddCustomer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/customer', AddCustomer::class)->name('customer');
    Route::get('/car', AddCar::class)->name('car');
});


Route::middleware(['auth', IsAdmin::class])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminView'])->name('admin.dashboard');
});
