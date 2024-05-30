<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CurrencyController;


Route::prefix('admin/')->name('admin.')->group(function(){
    Route::get('currency/data', [CurrencyController::class, 'getData'])->name('currency.data');
    Route::post('toggle-active/{currency}', [CurrencyController::class, 'toggleActive'])->name('currency.toggleActive');
    Route::resource('currency',CurrencyController::class);
    
});


