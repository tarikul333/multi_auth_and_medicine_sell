<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Employee\LoginController as EmployeeLoginController;
use Illuminate\Support\Facades\Route;


// admin routes
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

// admin create register form routes
Route::group(['middleware' => 'admin.auth'], function(){
    Route::get('/employee/account/register', [EmployeeLoginController::class, 'register'])->name('employee.register');
    Route::post('/employee/account/register-create', [EmployeeLoginController::class, 'employeeRegister'])->name('employee.createRegister');

    Route::get('/admin/account/register', [AdminLoginController::class, 'register'])->name('admin.register');
    Route::post('/admin/account/register-create', [AdminLoginController::class, 'adminRegister'])->name('admin.createRegister');
});
