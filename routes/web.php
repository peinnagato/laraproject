<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products/{id}',[MainController::class,'product']);
Route::get('/products', function () {
    return view('products');
});
Route::get('/about', function () {
   return view('about');
});
Route::get('/contact', function () {
   return view('contact');
});

// Routing through Controller
 Route::get('/index',[TestController::class,'index']);

//  Routing through controller Group
//  Route::controller(MainController::class)->group(function(){
//    Route::get('/index','index');
//    Route::get('/products/{id}','product');
//  });


 Route::get('/raj-tamang',function(){
    return view('contact');
 });
 
 Route::prefix('admin')->group(function(){

    Route::get('/index', function(){
        return view('admin.index');
     });
     Route::get('/table', function(){
        return view('admin.table');
     });
     Route::get('/addproduct', function(){
         return view('admin.addproduct');
      });
     Route::post('/addproduct',[MainController::class,'addProductController']);
     
 });
 Route::fallback(function(){
    return view('/admin/404');

 });

 Route::get('/showuser',[UserController::class,'showUser'])->name('show.user');
 Route::get('/singleuser/{id}',[UserController::class,'singleUser'])->name('view.user');

 Route::get('/adduser', function(){
         return view('admin.addproduct');
 });
 Route::post('/adduser',[UserController::class,'addUser'])->name('add.user');
 Route::get('/deleteuser/{id}',[UserController::class,'deleteUser'])->name('delete.user');