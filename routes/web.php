<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\statisticsController;
use App\Http\Controllers\AccountFEController;
use App\Http\Controllers\ProductFEController;
use App\Http\Controllers\CartFEController;


Route::get('admin/users/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Account
        Route::prefix('accounts')->group(function () {
            Route::get('add', [AccountController::class, 'create']);
            Route::post('add', [AccountController::class, 'store']);
            Route::get('list', [AccountController::class, 'index']);
            Route::get('edit/{user}', [AccountController::class, 'show']);
            Route::post('edit/{user}', [AccountController::class, 'update']);
            Route::DELETE('destroy', [AccountController::class, 'destroy']);
        });

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        //Article
        Route::prefix('articles')->group(function () {
            Route::get('add', [ArticleController::class, 'create']);
            Route::post('add', [ArticleController::class, 'store']);
            Route::get('list', [ArticleController::class, 'index']);
            Route::get('edit/{article}', [ArticleController::class, 'show']);
            Route::post('edit/{article}', [ArticleController::class, 'update']);
            Route::DELETE('destroy', [ArticleController::class, 'destroy']);
        });

        #Review
        Route::prefix('reviews')->group(function () {
            Route::get('list', [ReviewController::class, 'index']);
            Route::DELETE('destroy', [ReviewController::class, 'destroy']);
        });

        #Order
        Route::get('customers', [CartController::class, 'index']);
        Route::get('customers/view/{customer}', [CartController::class, 'show']);
        Route::get('customers/edit/{customer}', [CartController::class, 'edit']);
        Route::post('customers/edit/{customer}', [CartController::class, 'update']);
        Route::DELETE('destroy', [CartController::class, 'destroy']);

        // statistics
        Route::get('statistics/list', [statisticsController::class, 'index']);

    });
});

// =======================================================================================================================

Route::prefix('Auth')->group(function () {
    Route::get('login', [AccountFEController::class, 'index'])->name('Auth.login');
    Route::post('login/store', [AccountFEController::class, 'store']);

    Route::get('/register', [AccountFEController::class, 'create'])->name('register');
    Route::post('/register', [AccountFEController::class, 'store1']);

    Route::post('/logout', [AccountFEController::class, 'logout'])->name('logout');

    Route::get('/list', [AccountFEController::class, 'list'])->name('Auth.list');
    Route::post('/update/{user}', [AccountFEController::class, 'update'])->name('Auth.update');
    Route::get('customers/view/{customer}', [AccountFEController::class, 'show']);
    Route::put('customers/update/{id}', [AccountFEController::class, 'updateStatus'])->name('customers.updateStatus');

});

// =======================================================================================================================

Route::get('/', [App\Http\Controllers\MainFEController::class, 'index'])->name('home');
Route::post('/services/load-product', [App\Http\Controllers\MainFEController::class, 'loadProduct']);

// =======================================================================================================================

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuFeController::class, 'index']);

// =======================================================================================================================

Route::get('san-pham/{id}-{slug}.html', [ProductFEController::class, 'index']);
Route::get('/products', [ProductFEController::class, 'search'])->name('products.search');
Route::post('/product/{id}/review', [ProductFEController::class, 'store'])->name('product.review');
Route::get('/product/{id}', [ProductFEController::class, 'show'])->name('product.show');
// Route::get('/recommend', [App\Http\Controllers\ProductFEController::class, 'recommend'])->name('recommend');

// =======================================================================================================================

Route::post('add-cart', [CartFEController::class, 'index']);
Route::get('carts', [CartFEController::class, 'show'])->name('carts.list');
Route::post('update-cart', [CartFEController::class, 'update']);
Route::get('carts/delete/{id}', [CartFEController::class, 'remove']);
Route::post('carts', [CartFEController::class, 'addCart']);

// =======================================================================================================================

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');

// =======================================================================================================================

// Product Recommend
// Route::get('/recommend', [App\Http\Controllers\RecommendationController::class, 'recommend'])->name('recommend');

// Route::get('/recommendations', [App\Http\Controllers\RecommendationController::class, 'recommend'])->name('recommendations');





