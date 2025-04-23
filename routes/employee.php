<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\LoginController as EmployeeLoginController;
use App\Http\Controllers\Employee\OrderController;
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
        Route::get('/get-stores/{city_id}', [OrderController::class, 'getStores']);
        Route::post('/orders/create', [OrderController::class, 'store'])->name('order.store');
        Route::get('/employee/order/invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');

        Route::post('logout', [EmployeeLoginController::class, 'logout'])->name('logout'); 
    });

});
