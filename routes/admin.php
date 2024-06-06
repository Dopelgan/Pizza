<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminItemsController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminCouriersController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminItemVariantsController;

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

        Route::post('/login', [AdminAuthController::class, 'login'])->name('login');

    });

});

Route::middleware('auth:admin')->group(function(){

    //Заказы
    Route::namespace('orders')->prefix('/orders')->group(function(){

        Route::namespace('.')->group(function(){

            Route::post('/list', [AdminOrdersController::class, 'list'])->name('list');
            Route::post('/get/{order}', [AdminOrdersController::class, 'get'])->name('get');
            Route::post('/cancel/{order}', [AdminOrdersController::class, 'cancel'])->name('cancel');
            Route::post('/out-of-delivery/{order}', [AdminOrdersController::class, 'outOfDelivery'])->name('cancel');
            Route::post('/accept/{order}', [AdminOrdersController::class, 'accept'])->name('cancel');
            Route::post('/complete/{order}', [AdminOrdersController::class, 'complete'])->name('complete');
            Route::post('/change-courier/{order}', [AdminOrdersController::class, 'changeCourier'])->name('change-courier');

        });

    });

    //Категории
    Route::namespace('categories')->prefix('/categories')->group(function(){

        Route::namespace('.')->group(function(){

            Route::post('/list', [AdminCategoriesController::class, 'list'])->name('list');
            Route::post('/get/{category}', [AdminCategoriesController::class, 'get'])->name('get');
            Route::post('/add', [AdminCategoriesController::class, 'add'])->name('add');
            Route::post('/edit/{category}', [AdminCategoriesController::class, 'edit'])->name('edit');
            Route::post('/remove/{category}', [AdminCategoriesController::class, 'remove'])->name('remove');

        });

    });

    //Товары
    Route::namespace('items')->prefix('/items')->group(function(){

        Route::namespace('.')->group(function(){

            Route::post('/list', [AdminItemsController::class, 'list'])->name('list');
            Route::post('/add', [AdminItemsController::class, 'add'])->name('add');
            Route::post('/get/{item}', [AdminItemsController::class, 'get'])->name('get');
            Route::post('/edit/{item}', [AdminItemsController::class, 'edit'])->name('edit');
            Route::post('/change-status/{item}/{is_available}', [AdminItemsController::class, 'changeStatus'])->name('change-status');
            Route::post('/upload-picture/{item}', [AdminItemsController::class, 'uploadPicture'])->name('upload-picture');
            Route::post('/remove/{item}', [AdminItemsController::class, 'remove'])->name('remove');

        });

    });

    //Товары (варианты)
    Route::namespace('item-variants')->prefix('/item-variants')->group(function(){

        Route::namespace('.')->group(function(){

            Route::post('/list', [AdminItemVariantsController::class, 'list'])->name('list');
            Route::post('/add', [AdminItemVariantsController::class, 'add'])->name('add');
            Route::post('/edit/{item_variant}', [AdminItemVariantsController::class, 'edit'])->name('edit');
            Route::post('/remove{item_variant}', [AdminItemVariantsController::class, 'remove'])->name('remove');

        });

    });

    //Курьеры
    Route::namespace('couriers')->prefix('/couriers')->group(function(){

        Route::namespace('.')->group(function(){

            Route::post('/list', [AdminCouriersController::class, 'list'])->name('list');
            Route::post('/add', [AdminCouriersController::class, 'add'])->name('add');
            Route::post('/get/{courier}', [AdminCouriersController::class, 'get'])->name('get');
            Route::post('/change-password/{courier}', [AdminCouriersController::class, 'changePassword'])->name('edit');
            Route::post('/edit/{courier}', [AdminCouriersController::class, 'edit'])->name('edit');
            Route::post('/remove/{courier}', [AdminCouriersController::class, 'remove'])->name('remove');

        });

    });

    //Профиль
    Route::namespace('profile')->prefix('/profile')->group(function(){

        Route::namespace('.')->group(function(){

            Route::post('/me', [AdminProfileController::class, 'me'])->name('me');
            Route::post('/change-password', [AdminProfileController::class, 'changePassword'])->name('change-password');
            Route::post('/logout', [AdminProfileController::class, 'logout'])->name('logout');

        });

    });

});


