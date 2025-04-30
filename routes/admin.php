<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\ProfileController;
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

        Route::get('/employees-details', [EmployeeController::class, 'index'])->name('employees.details');
        Route::get('/employee/{id}/sales', [EmployeeController::class, 'show'])->name('show.sales');
        Route::get('/order/invoice/{id}', [EmployeeController::class, 'invoice'])->name('show.invoice');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/profile/image/update/{user}', [ProfileController::class, 'imageUpdate'])->name('profile.image.update');
        Route::patch('/profile/password', action: [ProfileController::class, 'passwordUpdate'])->name('password.update');

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
