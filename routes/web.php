<?php

use App\Http\Controllers\admin\BrandsController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductImageController;
use App\Http\Controllers\admin\ProductSubCategoryController;
use App\Http\Controllers\admin\ShippingChargesController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\TempImagesController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


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

// ==== Frontend ====

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/shop/{categorySlug?}/{subcategorySlug?}', [shopController::class, 'shop'])->name('shop'); // Shop.
Route::get('/product/{slug}', [shopController::class, 'detail'])->name('detail'); // Product Detail.
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart'); // Product add-to-cart.
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updateCart'); // Product Update-cart.
Route::post('/delete-cart', [CartController::class, 'destroyCart'])->name('deleteCart'); // Delete-cart.
Route::get('/cart', [CartController::class, 'cart'])->name('cart'); // Product Cart Page.

// ==== Frontend Middleware ====.

Route::group(['prefix' => '/user'], function () {

    Route::group(['middleware' => 'guest'], function () {

        Route::get('/login', [UserController::class, 'login'])->name('user.login'); // create.
        Route::post('/login', [UserController::class, 'store'])->name('user.store'); // store.
        Route::get('/register', [UserController::class, 'register'])->name('user.register.create'); // create.
        Route::post('/register', [UserController::class, 'processRegister'])->name('user.register'); // store.
    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/checkout', [CartController::class, 'create'])->name('checkout.create');
        Route::post('/checkout', [CartController::class, 'store'])->name('checkout.store');
        Route::get('/orders', [UserController::class, 'orders'])->name('userOrders');
        Route::get('/orderDetails/{id}', [UserController::class, 'orderDetails'])->name('userOrderDetails');
        Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    });

});

// ==== End =====

// ==== Frontend End ====


// ==================================== Admin ====================================================

// ==== Admin Middleware ====.

Route::group(['prefix' => '/admin'], function() {

    Route::group(['middleware' => 'admin.guest'], function() {

        Route::get('/login', [AdminController::class, 'create'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'store'])->name('admin.store');

    });

    Route::group(['middleware' => 'admin.auth'], function() {

        Route::get('/panel', [DashboardController::class, 'dashboard'])->name('dashboard');

        // Orders.
        Route::get('/orders', [OrdersController::class, 'index'])->name('adminOrders'); //List.
        Route::get('/orders/{id}', [OrdersController::class, 'detail'])->name('adminOrdersId');
        Route::post('/orderStatus/{id}', [OrdersController::class, 'orderStatus'])->name('orderStatusId');

        Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

    });

});

// ==== End ====.


Route::group(['prefix' => '/category'], function () {

Route::get('/create', [categoryController::class, 'create'])->name('category.create');
Route::post('/store', [categoryController::class, 'store'])->name('category.store');
Route::get('/list',[categoryController::class, 'list'])->name('category.list');
Route::get('/edit/{id}', [categoryController::class, 'edit'])->name('category.edit');
Route::put('/update/{id}', [categoryController::class, 'update'])->name('category.update');
Route::delete('/delete/{id}', [categoryController::class, 'destroy'])->name('category.delete');

// Generated Slug.
Route::get('/getSlug', function (Request $request) {

$slug = '';

    if (!empty($request->title)) {

        $slug = Str::slug($request->title);
    }
        return response()->json([
            'status' => true,
            'slug' => $slug
        ]);

    })->name('getSlug');
});


// Tempary-Images-Route.
Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('temp-images.create');
// End.


Route::group(['prefix' => '/sub/category'], function() {

    Route::get('/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::post('/store', [SubCategoryController::class, 'store'])->name('sub-category.store');
    Route::get('/list', [SubCategoryController::class, 'list'])->name('sub-category.list');
    Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::put('/update/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::delete('/delete/{id}', [SubCategoryController::class, 'destroy'])->name('sub-category.delete');

});


Route::group(['prefix' => '/brands'], function() {

    Route::get('/', [BrandsController::class, 'index'])->name('brands.index'); // create.
    Route::get('/fetch', [BrandsController::class, 'fetch'])->name('fetch.brands'); // list.
    Route::post('/', [BrandsController::class, 'store'])->name('brands.store');
    Route::get('/edit/{id}', [BrandsController::class, 'edit'])->name('brands.edit');
    Route::put('/update/{id}', [BrandsController::class, 'update'])->name('brands.update');
    Route::delete('/delete/{id}', [BrandsController::class, 'destroy'])->name('brands.delete');

});


Route::group(['prefix' => '/products'], function () {

    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/subcategories', [ProductSubCategoryController::class, 'check'])->name('product.subcategories.index');
    Route::get('/', [ProductController::class, 'list'])->name('product.list');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/getproducts', [ProductController::class, 'getproducts'])->name('getproducts');

});

// ProductImages.
Route::post('/products-images/update/{product_id}', [ProductImageController::class, 'update'])->name('product-images.update');
Route::delete('/products-images', [ProductImageController::class, 'destroy'])->name('product-images.delete');
// End.

Route::group(['prefix' => '/shipping'], function() {

    Route::get('/', [ShippingChargesController::class, 'index'])->name('shipping.index');
    Route::get('/list', [ShippingChargesController::class, 'list'])->name('shipping.list');
    Route::post('/', [ShippingChargesController::class, 'store'])->name('shipping.store');
    Route::get('/edit/{id}', [ShippingChargesController::class, 'edit'])->name('shipping.edit');
    Route::put('/update/{id}', [ShippingChargesController::class, 'update'])->name('shipping.update');
    Route::delete('/delete/{id}', [ShippingChargesController::class, 'destroy'])->name('shipping.delete');

});


// ==== End ====.


// ==================================== Admin End =================================================
