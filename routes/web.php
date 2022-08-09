<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ManagerData\PenggunaComponent;
use App\Http\Livewire\ManagerData\ServiceComponent;
use App\Http\Livewire\ManagerData\CustomersComponent;
use App\Http\Livewire\ManagerSales\SalesComponent;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/home', HomeComponent::class)->name('home');
});

Route::middleware(['auth:sanctum', 'auth.master', 'verified'])->group(function () {
    Route::get('/manager-data-customers', CustomersComponent::class)->name('manager.data.customers');
    Route::get('/manager-data-pengguna', PenggunaComponent::class)->name('manager.data.pengguna');
    Route::get('/manager-data-service', ServiceComponent::class)->name('manager.data.service');
});

Route::middleware(['auth:sanctum', 'auth.sales', 'verified'])->group(function () {
    // Route::get('/manager-data-pengguna',PenggunaComponent::class)->name('manager.data.pengguna');
    Route::get('/manager-data-sales', SalesComponent::class)->name('manager.data.sales');
});
