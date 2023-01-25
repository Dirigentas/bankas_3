<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController as C;

Route::prefix('/clients')->name('clients-')->group(function () {
    Route::get('/index', [C::class, 'index'])->name('index');    
    Route::get('/create', [C::class, 'create'])->name('create');
    Route::post('/store', [C::class, 'store'])->name('store');    
    Route::get('/edit{client}', [C::class, 'edit'])->name('edit');
    Route::put('/update{client}', [C::class, 'update'])->name('update');    
    Route::delete('/destroy{client}', [C::class, 'destroy'])->name('destroy');    
});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
