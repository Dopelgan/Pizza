<?php

use App\Http\Controllers\Client\ClientBasketController;
use App\Http\Controllers\Client\ClientOrdersController;
use App\Http\Controllers\Client\ClientItemsController;
use App\Http\Controllers\Client\ClientProfileController;
use App\Http\Controllers\Client\ClientAuthController;
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

//Авторизация
Route::namespace('auth')->prefix('/auth')->group(function(){

    Route::namespace('.')->group(function(){

        Route::post('/login', [ClientAuthController::class, 'login'])->name('login');
        Route::post('/register', [ClientAuthController::class, 'register'])->name('register');

    });

});

//Корзина
Route::namespace('basket')->prefix('/basket')->group(function(){

    Route::namespace('.')->group(function(){

        Route::post('/get', [ClientBasketController::class, 'get'])->name('get');
        Route::post('/add/{item_variant}', [ClientBasketController::class, 'add'])->name('add');
        Route::post('/change-quantity/{item_variant}', [ClientBasketController::class, 'changeQuantity'])->name('change-quantity');
        Route::post('/remove/{item_variant}', [ClientBasketController::class, 'remove'])->name('remove');
        Route::post('/clear', [ClientBasketController::class, 'clear'])->name('clear');

    });

});

//Заказы
Route::namespace('orders')->prefix('/orders')->group(function(){

    Route::namespace('.')->group(function(){

        Route::post('/create', [ClientOrdersController::class, 'create'])->name('create');
        Route::post('/list', [ClientOrdersController::class, 'list'])->name('list');
        Route::post('/get/{code}/{hash}', [ClientOrdersController::class, 'get'])->name('get');

    });

});

//Товары
Route::namespace('items')->prefix('/items')->group(function(){

    Route::namespace('.')->group(function(){

        Route::post('/list', [ClientItemsController::class, 'list'])->name('list');
        Route::post('/get/{item}', [ClientItemsController::class, 'get'])->name('get');

    });

});



Route::middleware('auth:client')->group(function(){

    //Профиль
    Route::namespace('profile')->prefix('/profile')->group(function(){

        Route::namespace('.')->group(function(){

            Route::post('/me', [ClientProfileController::class, 'me'])->name('me');
            Route::post('/logout', [ClientProfileController::class, 'logout'])->name('logout');

        });

    });

});


