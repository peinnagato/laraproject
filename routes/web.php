<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', function () {
    return view('products');
});

 Route::get('/index',[MainController::class,'index']);
