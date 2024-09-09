<?php

use App\Http\Middleware\IsAdmin;
use App\Livewire\AddCar;
use App\Livewire\AddCustomer;
use App\Livewire\ApplyCarForServices;
use App\Livewire\CustomerView;
use App\Livewire\ServicesView;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    IsAdmin::class,
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/customer', AddCustomer::class)->name('customer');
    Route::get('/car', AddCar::class)->name('car');
    Route::get('/services', ApplyCarForServices::class)->name('services');
    Route::get('/services-view', ServicesView::class)->name('services-view');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/customer-dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');
    Route::get('/customer-view', CustomerView::class)->name('customer-view');
});
