<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Courier\CourierOrdersController;
use App\Http\Controllers\Courier\CourierAuthController;
use App\Http\Controllers\Courier\CourierProfileController;

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


//Авторизация
Route::namespace('auth')->prefix('/auth')->group(function(){

    Route::namespace('.')->group(function(){

        Route::post('/login', [CourierAuthController::class, 'login'])->name('login');

    });

});


Route::middleware('auth:courier')->group(function(){

    //Кабинет
    Route::namespace('profile')->prefix('/profile')->group(function(){

        Route::namespace('.')->group(function(){

            Route::post('/me', [CourierProfileController::class, 'me'])->name('me');
            Route::post('/logout', [CourierProfileController::class, 'logout'])->name('logout');

        });

    });

    //Заказы
    Route::namespace('orders')->prefix('/orders')->group(function(){

        Route::namespace('.')->group(function(){

            Route::post('/get-available', [CourierOrdersController::class, 'getAvailable'])->name('get-available');
            Route::post('/get-active', [CourierOrdersController::class, 'getActive'])->name('get-active');
            Route::post('/accept/{order}', [CourierOrdersController::class, 'accept'])->name('accept');
            Route::post('/set-status-on-way/{order}', [CourierOrdersController::class, 'setStatusOnWay'])->name('set-status-on-way');
            Route::post('/set-status-delivered/{order}', [CourierOrdersController::class, 'setStatusDelivered'])->name('set-status-delivered');

        });

    });

});



