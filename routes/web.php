<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController as C;
use App\Http\Controllers\IbanController as I;

Route::prefix('/clients')->name('clients-')->group(function () {
    Route::get('/index', [C::class, 'index'])->name('index')->middleware('roles:Ad|Ma');    
    Route::get('/create', [C::class, 'create'])->name('create')->middleware('roles:Ad');
    Route::post('/store', [C::class, 'store'])->name('store')->middleware('roles:Ad');    
    Route::get('/edit/{client}', [C::class, 'edit'])->name('edit')->middleware('roles:Ad|Ma');
    Route::put('/update/{client}', [C::class, 'update'])->name('update')->middleware('roles:Ad|Ma');    
    Route::delete('/destroy/{client}', [C::class, 'destroy'])->name('destroy')->middleware('roles:Ad');    
});

Route::prefix('/ibans')->name('ibans-')->group(function () {
    // Route::get('/index', [I::class, 'index'])->name('index');    
    Route::get('/create/{client}', [I::class, 'create'])->name('create')->middleware('roles:Ad|Ma');
    Route::post('/store', [I::class, 'store'])->name('store')->middleware('roles:Ad|Ma');    
    Route::get('/edit/{iban}', [I::class, 'edit'])->name('edit')->middleware('roles:Ad|Ma');
    Route::put('/update/{iban}', [I::class, 'update'])->name('update')->middleware('roles:Ad|Ma');    
    Route::delete('/destroy/{iban}', [I::class, 'destroy'])->name('destroy')->middleware('roles:Ad');    
});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
