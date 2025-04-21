<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\LoginController as EmployeeLoginController;
use Illuminate\Support\Facades\Route;


// employee route
Route::group(['prefix' => 'employee'], function() {
    
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/account/login', [EmployeeLoginController::class, 'index'])->name('employee.login');
        Route::post('/account/authenticate', [EmployeeLoginController::class, 'authenticate'])->name('employee.authenticate');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('home', [EmployeeController::class, 'index'])->name('employee.home');

        Route::get('/selles/list', [EmployeeController::class, 'sellesList'])->name('employee.sellesList');

        Route::post('logout', [EmployeeLoginController::class, 'logout'])->name('logout'); 
    });

});
