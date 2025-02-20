<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\LoginController as EmployeeLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::group(['prefix' => 'employee'], function() {
    
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/account/login', [EmployeeLoginController::class, 'index'])->name('employee.login');
        Route::post('/account/authenticate', [EmployeeLoginController::class, 'authenticate'])->name('employee.authenticate');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('home', [EmployeeController::class, 'index'])->name('employee.home');
        Route::post('logout', [EmployeeLoginController::class, 'logout'])->name('logout'); 
    });

});

Route::group(['prefix' => 'admin'], function() {
    
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/account/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/account/login/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate'); 
    });

    Route::group(['middleware' => 'admin.auth'], function() {
        Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
        Route::post('/account/logout', [AdminLoginController::class, 'logout'])->name('admin.logout'); 
    });

});

Route::group(['middleware' => 'admin.auth'], function(){
    Route::get('/employee/account/register', [EmployeeLoginController::class, 'register'])->name('employee.register');
    Route::post('/employee/account/register-create', [EmployeeLoginController::class, 'employeeRegister'])->name('employee.createRegister');
});
















