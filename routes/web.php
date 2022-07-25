<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ManagerData\PenggunaComponent;
use App\Http\Livewire\ManagerData\CustomersComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/home',HomeComponent::class)->name('home');
});

Route::middleware(['auth:sanctum','auth.master','verified'])->group(function(){
    Route::get('/manager-data-customers',CustomersComponent::class)->name('manager.data.customers');
    Route::get('/manager-data-pengguna',PenggunaComponent::class)->name('manager.data.pengguna');
});

Route::middleware(['auth:sanctum','auth.sales','verified'])->group(function(){
    // Route::get('/manager-data-pengguna',PenggunaComponent::class)->name('manager.data.pengguna');
    // Route::get('/manager-data-customers',CustomersComponent::class)->name('manager.data.customers');
});





