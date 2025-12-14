<?php


use App\Http\Controllers\Seller\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('seller_product_list',[SellerController::class,'sellerProductList'])->name('seller.product.list');
