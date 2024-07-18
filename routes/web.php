<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\DataSource;
use App\Livewire\DataView;
use App\Livewire\SearchByPhoneNumber;
use App\Livewire\SearchByVehiclePlate;
use App\Livewire\CallNetwork;
use App\Http\Controllers\CdrController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('data-source');
    })->name('dashboard');

    Route::get('/data-source',[DataSource::class ,'render'])->name('data-source');
    Route::get('/data-view', DataView::class)->name('data-view');
    Route::get('/search-by-phonenumber',[SearchByPhoneNumber::class ,'render'])->name('search-by-phonenumber');
    Route::get('/search-by-vehicle-number',[SearchByVehiclePlate::class ,'render'])->name('search-by-vehicle-number');
    Route::get('/cdr',CallNetwork::class)->name('cdr');
    Route::get('/cdr/{id}', [CdrController::class, 'show'])->name('cdr.show');


});
