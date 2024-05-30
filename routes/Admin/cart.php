<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CartController;


Route::prefix('admin/')->name('admin.')->group(function(){
    Route::resource('cart',CartController::class);
});


