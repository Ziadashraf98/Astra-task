<?php

use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\SubCategories\SubCategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){

    Auth::routes(['register'=>false]);
});

Route::group(['middleware'=>'auth'],function(){
    
    Route::resources([
        'categories'=>CategoryController::class,
        'subcategories'=>SubCategoryController::class,
        'products'=>ProductController::class,
    ]);
});


Route::get('/admin', [HomeController::class, 'index'])->name('admin');
