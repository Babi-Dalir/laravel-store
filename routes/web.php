<?php

use App\Http\Controllers\FrontEnd\HomeController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';



Route::get('/',[HomeController::class,'home'])->name('home');


