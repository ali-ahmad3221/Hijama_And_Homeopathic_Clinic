<?php

use App\Http\Controllers\Web\CollectionController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





// Route::get('collections/{name?}', [CollectionController::class, 'collections'])->name('shop.collection');
// Route::get('product/{slug?}', [CollectionController::class, 'productDetail'])->name('collection.product.view');

















Route::get('signup', function(){
    return view('auth.signup');
})->name('singup');
