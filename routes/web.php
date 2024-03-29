<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\Brand;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Frontend\UserComponent;





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



Auth::routes();




Route::middleware(['auth:sanctum','verified'])->group(function (){



    Route::get('profile',UserComponent::class)->name('user.profile');
    Route::post('profile',[UserComponent::class ,'updateUserDetails'])->name('user.post');


});


Route::controller(FrontendController::class)->group(function (){
    Route::get('/','index');
    Route::get('/collections', 'categories')->name('categories');
    Route::get('/collections/{category_slug}','products')->name('products');
    Route::get('/collections/{category_slug}/{product_slug}','productView')->name('productView');


    Route::get('/new-arrivals','newArrival')->name('newArrival');
    Route::get('/featured-products','featuredProducts')->name('featuredProducts');

    Route::get('search','searchProducts');

});



Route::middleware('auth')->group(function (){

    Route::get('wishlist',[WishlistController::class,'index'])->name('wishlist');
    Route::get('cart',[CartController::class,'index'])->name('cart');
    Route::get('checkout',[CheckoutController::class,'index'])->name('checkout');

    Route::get('orders',[OrderController::class,'index'])->name('orders');
    Route::get('orders/{orderId}',[OrderController::class,'show'])->name('show');

    //Route::get('profile',[\App\Http\Controllers\Frontend\UserController::class,'index']);
});


Route::get('thank-you',[FrontendController::class, 'thankyou']);








Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){

    //DashBoard Route
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');


    Route::get('/settings',[SettingController::class,'index'])->name('admin.settings');
    Route::post('/settings',[SettingController::class,'store'])->name('setting.Store');

    Route::controller(SliderController::class)->group(function () {

        Route::get('sliders','index')->name('sliders');
        Route::get('sliders/create','create');
        Route::post('sliders/create','store');
        Route::get('sliders/{slider}/edit','edit');
        Route::put('sliders/{slider}','update');
        Route::get('sliders/{slider}/delete','destroy');


    });

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
        Route::get('/products/{product}/edit','edit');
        Route::put('products/{product}','update');
        Route::get('products/{product_id}/delete','destroy');
        Route::get('/product-image/{product_image_id}/delete','destroyImage');

        //Ajax için olan route
        Route::post('product-color/{prod_color_id}','updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete','deleteProdColor');



    });


    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class)->name('brands');

    Route::controller(ColorController::class)->group(function ()
    {
        Route::get('/colors','index')->name('colors.index');
        Route::get('/colors/create','create')->name('colors.create');
        Route::post('/colors/create','store')->name('colors.store');
        Route::get('/colors/{color}/edit','edit');
        Route::put('/colors/{color_id}','update');
        Route::get('/colors/{color_id}/delete','destroy');


    });

    //admin Orders Route:
    Route::controller(OrdersController::class)->group(function ()
    {
        Route::get('/orders','index');
        Route::get('/orders/{orderId}','show');
        Route::put('/orders/{orderId}','updateOrderStatus');


        Route::get('/invoice/{orderId}','viewInvoice');
        Route::get('/invoice/{orderId}/generate','generateInvoice');
    });



    Route::controller(UserController::class)->group(function ()
    {
        Route::get('/users','index');
        Route::get('/users/create','create');
        Route::post('/users','store');
        Route::get('/users/{user_id}/edit' , 'edit');
        Route::put('users/{user_id}','update');
        Route::get('users/{user_id}/delete','destroy');

    });



});
