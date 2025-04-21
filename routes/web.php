<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

require __DIR__.'/admin.php';
require __DIR__.'/employee.php';















