<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\LoginController as EmployeeLoginController;
use App\Http\Controllers\Employee\OrderController;
use App\Http\Controllers\Employee\ProfileController;
use App\Http\Controllers\Employee\StoreController;
use Illuminate\Support\Facades\Route;


// employee route
Route::group(['prefix' => 'employee'], function() {
    
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/account/login', [EmployeeLoginController::class, 'index'])->name('employee.login');
        Route::post('/account/authenticate', [EmployeeLoginController::class, 'authenticate'])->name('employee.authenticate');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('home', [EmployeeController::class, 'index'])->name('employee.home');

        Route::get('/selles/list', [EmployeeController::class, 'ordersList'])->name('employee.ordersList');

        Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');
        // Dynamic dependent dropdown routes
        Route::get('/get-addresses/{city_id}', [OrderController::class, 'getAddressesByCity']);
        Route::get('/get-stores-by-address/{address_id}', [OrderController::class, 'getStoresByAddress']);


        Route::post('/orders/create', [OrderController::class, 'store'])->name('order.store');
        Route::get('/order/invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');

        Route::get('/store/create', [StoreController::class, 'create'])->name('create.store');
        Route::post('/store/create', [StoreController::class, 'store'])->name('store_create.store');

        Route::get('/profile', [ProfileController::class, 'index'])->name('employee.profile');
        Route::patch('/profile/image/update', [ProfileController::class, 'imageUpdate'])->name('employee.profile.image');
        Route::patch('/profile/password/update', [ProfileController::class, 'passUpdate'])->name('employee.password.update');

        Route::post('logout', [EmployeeLoginController::class, 'logout'])->name('logout'); 

        Route::get('stores', [StoreController::class, 'index'])->name('stores.index');
    });

});
