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

 Route::get('/raj-tamang',function(){
    return view('contact');
 });
 Route::get('/admin/index', function(){
    return view('admin/index');
 });
 Route::prefix('admin')->group(function(){

    Route::get('/index', function(){
        return view('admin.index');
     });
     Route::get('/flag', function(){
        return view('admin.flag');
     });
 });
 Route::fallback(function(){
    return "<h1>Page not Found </h1>";

 });
