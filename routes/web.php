<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductLineController;
use App\Http\Controllers\Admin\QuantityController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryPagecontroller;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::post('/account/update-password', [AccountController::class, 'updatePassword'])->name('account.updatePassword');
    Route::post('/account/update-phone', [AccountController::class, 'updatePhone'])->name('account.updatePhone');
    Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account/delete', [AccountController::class, 'destroy'])->name('account.destroy');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/remove/{key}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/category', [CategoryPagecontroller::class, 'index'])->name('category.index');
Route::get('/category/{id}', [CategoryPagecontroller::class, 'showCategory'])->name('category.show');
Route::get('/product-line/{id}', [CategoryPagecontroller::class, 'showProductLine'])->name('productLine.show');
Route::get('/product/{id}', [HomeController::class, 'getProduct']);

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin');
    // Profile Routes
    Route::prefix('dashboard/users')->name('users.')->group(function(){
        Route::get('/',[UserController::class, 'index'])->name('index');
        Route::post('/update-role/{id}',[UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}',[UserController::class, 'destroy'])->name('destroy');
    });
    
    // Category Routes
    Route::prefix('dashboard/category')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/add', [CategoryController::class, 'store'])->name('store');
        Route::post('/update', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    // Brand Routes
    Route::prefix('dashboard/brand')->name('brands.')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::post('/add', [BrandController::class, 'store'])->name('store');
        Route::post('/update', [BrandController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('destroy');
    });

    // Color Routes
    Route::prefix('dashboard/color')->name('colors.')->group(function () {
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::post('/add', [ColorController::class, 'store'])->name('store');
        Route::post('/update/{color}', [ColorController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ColorController::class, 'destroy'])->name('destroy');
    });
    // ProductLine routes
    Route::prefix('dashboard/productLine')->name('productLines.')->group(function () {
        Route::get('/', [ProductLineController::class, 'index'])->name('index');
        Route::post('/add', [ProductLineController::class, 'store'])->name('store');
        Route::post('/update', [ProductLineController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProductLineController::class, 'destroy'])->name('destroy');
        Route::get('/by-brand/{brand_id}', [ProductLineController::class, 'getByBrand'])->name('by-brand');
    });

    // Size Routes
    Route::prefix('dashboard/size')->name('sizes.')->group(function () {
        Route::get('/',[SizeController::class, 'index'])->name('index');
        Route::post('/store', [SizeController::class, 'store'])->name('store');
        Route::post('/update/{id}', [SizeController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SizeController::class, 'destroy'])->name('destroy');
    });


    // Order Routes
    Route::prefix('dashboard/order')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{id}', [OrderController::class, 'show'])->name('show');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::post('/update-status', [OrderController::class, 'updateStatus'])->name('update-status');
        Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->name('destroy');
    });

    // Quantity Routes
    Route::prefix('dashboard/quantity')->name('quantities.')->group(function () {
        Route::get('/', [QuantityController::class, 'index'])->name('index');
        Route::post('/add', [QuantityController::class, 'store'])->name('store');
        Route::post('/update', [QuantityController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [QuantityController::class, 'destroy'])->name('destroy');
    });

    // Product Routes
    Route::prefix('dashboard/product')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('/add', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::delete('/image/{id}', [ProductController::class, 'deleteThumb']);

    });

    // Lấy brand theo category
    Route::get('api/brands-by-category/{category_id}', [ProductController::class, 'getBrandsByCategory']);
    // Lấy product line theo brand
    Route::get('api/product-lines-by-brand/{brand_id}', [ProductController::class, 'getProductLinesByBrand']);

    
    // routes/api.php
    Route::get('/categories', [ProductController::class, 'getCategories']);
    Route::get('/brands', [ProductController::class, 'getBrandsByCategory']);
    Route::get('/product-lines', [ProductController::class, 'getProductLinesByBrand']);
    Route::get('/products', [ProductController::class, 'getProducts']);
    
    // Slide
    Route::get('dashboard/slides',[ SlideController::class, 'index'])->name('slides.index');
    Route::post('dashboard/slides/store', [SlideController::class, 'store'])->name('slides.store');
    Route::put('dashboard/slides/update/{slide}', [SlideController::class, 'update'])->name('slides.update');
    Route::delete('dashboard/slides/destroy/{id}', [SlideController::class, 'destroy'])->name('slides.destroy');
    // // Upload routes
    // Route::post('/upload', [UploadController::class, 'uploadImage']);
    // Route::post('/uploads', [UploadController::class, 'uploadImages']);

});    


