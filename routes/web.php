<?php

use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\PaymentController;
use App\Http\Controllers\FrontEnd\ProductController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';



Route::get('/',[HomeController::class,'home'])->name('home');

Route::get('/single_products/{slug}',[ProductController::class,'singleProduct'])->name('single.product');

Route::get('/payment/callback',[PaymentController::class,'callback'])->name('payment.callback');

Route::get('/main_category_product_list/{slug}',[ProductController::class,'mainCategoryProductList'])->name('main.category.product.list');
Route::get('/payment/callback',[PaymentController::class,'callback'])->name('payment.callback');


Route::middleware('auth')->group(function (){

    Route::get('/user_cart',[HomeController::class,'userCart'])->name('user.cart');

    Route::get('/shopping',[HomeController::class,'shopping'])->name('user.shopping');

    Route::get('/shopping_payment',[HomeController::class,'shoppingPayment'])->name('user.shopping.payment');

    Route::get('/payment',[PaymentController::class,'payment'])->name('payment');
});


