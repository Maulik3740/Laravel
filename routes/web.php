<?php

use App\Models\Order;
use App\Livewire\Admin\Brand\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactRequest;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');

    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featuredProducts', 'featuredProducts');
    Route::get('/search', 'searchProducts');

    Route::get('/contact', 'contact');
    Route::post('/contact', 'storeContact');
    Route::get('/about_us', 'aboutUs');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);

    Route::get('/orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('/orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);

    Route::get('/profile', [App\Http\Controllers\Frontend\UserController::class, 'show']);
    Route::post('/profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);

    Route::get('/change-password', [App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('/change-password', [App\Http\Controllers\Frontend\UserController::class, 'changePassword']);
});

Route::get('/thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

Route::get('/admin', function () {
    return view('layouts.admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth' => 'isAdmin'])->group(function () {

    Route::get('/search', [SearchController::class, 'search']);

    Route::get('/dash', [DashboardController::class, 'index']);

    Route::get('/settings', [SettingController::class, 'index']);
    Route::post('/settings', [SettingController::class, 'store']);

    Route::controller(CategoryController::class)->group(function () {

        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');

        Route::any('product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete', 'deleteProdColor');
    });

    Route::get('/brands', App\Livewire\Admin\Brand\Index::class);

    Route::controller(ColorController::class)->group(function () {

        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete', 'delete');

        Route::post('product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete', 'deleteProdColor');
    });

    Route::controller(SliderController::class)->group(function () {

        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider}/delete', 'destroy');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');

        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');

        Route::get('/invoice/{orderId}/mail', 'mailInvoice');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user_id}/edit', 'edit');
        Route::put('/users/{user_id}', 'update');
        Route::get('/users/{user_id}/delete', 'delete');
    });

    Route::get('/contact', [ContactRequest::class,'contactRequest']);

});