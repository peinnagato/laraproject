<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\KhaltiPaymentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products/{id}',[MainController::class,'product']);
Route::get('/products',[ProductController::class,'showproduct']);
Route::get('/about', function () {
   return view('about');
});



Route::get('/singleproduct/{id}',[ProductController::class,'singleProduct'])->name('single.product');
Route::get('/contact', function () {
   return view('contact');
});

//Esewa Route
Route::post('/esewa',[EsewaController::class,'initiate'])->name('esewa2');  

Route::get('/success',[EsewaController::class,'esewaSuccess'])->name('gateway.verify.success');
Route::get('/paymentfail',[EsewaController::class,'esewaFail'])->name('payment.failed');
Route::get('/payment/success', [EsewaController::class, 'verifySuccess'])->name('payment.success');

//Khalti Route
Route::post('/khalti/initiate', [KhaltiPaymentController::class, 'initiatePayment'])->name('esewa');
Route::get('/payment/callback', [KhaltiPaymentController::class, 'paymentCallback']);
Route::get('/payment/lookup', [KhaltiPaymentController::class, 'verifyPayment'])->name('khalti.lookup');
Route::get('/returnurl', [KhaltiPaymentController::class,'retunrUrl']);


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

 Route::controller(UserController::class)->group(function(){
   
 Route::get('/updateuser/{id}','updateUser')->name('update.page');
  Route::post('/updateuser/{id}','updateSingleUser')->name('update.user');
 });

