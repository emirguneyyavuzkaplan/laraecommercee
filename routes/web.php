<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\Brand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){

    //DashBoard Route
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

    //Category Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category.index');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category', 'store')->name('category');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
    });

    //Products Routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('product.index');
        Route::get('/products/create','create')->name('products.create');
        Route::post('/products','store')->name('product.store');


    });

    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class)->name('brands');

});
