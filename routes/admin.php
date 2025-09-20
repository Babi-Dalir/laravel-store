<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GuarantyController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPriceController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//Main Route
Route::get('/',[PanelController::class, 'index'])->name('panel');

//Users Route
Route::resource('users', UserController::class);
Route::get('create_user_role/{id}',[UserController::class,'createUserRole'])->name('create.user.role');
Route::post('store_user_role/{id}',[UserController::class,'storeUserRole'])->name('store.user.role');

//roles Route
Route::resource('roles', RoleController::class);

//categories Route
Route::resource('categories', CategoryController::class);
Route::get('categories_trashed', [CategoryController::class, "trashed"])->name('categories.trashed');

//brands Route
Route::resource('brands', BrandController::class);

//colors Route
Route::resource('colors', ColorController::class);

//tags Route
Route::resource('tags', TagController::class);

//products Route
Route::resource('products', ProductController::class);
Route::get('products_trashed', [ProductController::class, "trashed"])->name('products.trashed');

//guaranty Route
Route::resource('guaranties', GuarantyController::class);

//ProductPrice Route
Route::get('product_prices/{id}', [ProductPriceController::class,'index'])->name('product.prices');

Route::get('create_product_prices/{product_id}', [ProductPriceController::class,'create'])->name('create.product.prices');

Route::post('store_product_prices/{product_id}', [ProductPriceController::class,'store'])->name('store.product.prices');

Route::get('edit_product_prices/{id}/{product_id}', [ProductPriceController::class,'edit'])->name('edit.product.prices');

Route::put('update_product_prices/{id}/{product_id}', [ProductPriceController::class,'update'])->name('update.product.prices');

// Gallery Route
Route::get('add_product_galleries/{id}', [ProductController::class,'addGallery'])->name('add.product.gallery');

Route::post('store_product_galleries/{id}', [ProductController::class,'storeGallery'])->name('store.product.gallery');

//PropertyGroup Route
Route::resource('property_groups', PropertyGroupController::class);

//Property Route
Route::get('create_product_properties/{product}', [ProductController::class,'createProductProperty'])->name('create.product.properties');

//Slider Route
Route::resource('sliders', SliderController::class);

//Banner Route
Route::resource('banners', BannerController::class);

<<<<<<< HEAD
//Banner Route
=======
//Comment Route
>>>>>>> e9d87ba (tree commit)
Route::get('users_comments', [CommentController::class,'userComments'])->name('users.comments');
