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
use App\Http\Controllers\admin\DiscountCouponsController;
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

// Frontend.
Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/shop/{categorySlug?}/{subcategorySlug?}', [shopController::class, 'shop'])->name('shop'); // Shop.
Route::get('/product/{slug}', [shopController::class, 'detail'])->name('detail'); // Product Detail.
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart'); // Product add-to-cart.
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updateCart'); // Product Update-cart.
Route::post('/delete-cart', [CartController::class, 'destroyCart'])->name('deleteCart'); // Delete-cart.
Route::get('/cart', [CartController::class, 'cart'])->name('cart'); // Product Cart Page.
Route::post('/applyDiscountCoupons', [CartController::class, 'applyDiscountCoupons'])->name('applyDiscountCoupons');

// Users Middleware. 
Route::group(['prefix' => '/user'], function () {

    Route::group(['middleware' => 'guest'], function () {

        // Login.
        Route::get('/login', [UserController::class, 'login'])->name('user.login'); // create.
        Route::post('/login', [UserController::class, 'store'])->name('user.store'); // store.

        // Register.
        Route::get('/register', [UserController::class, 'register'])->name('user.register.create'); // create.
        Route::post('/register', [UserController::class, 'processRegister'])->name('user.register'); // store.
    });

    Route::group(['middleware' => 'auth'], function () {

        // Checkouts.
        Route::get('/checkout', [CartController::class, 'create'])->name('checkout.create');
        Route::post('/checkout', [CartController::class, 'store'])->name('checkout.store');

        // Orders.
        Route::get('/orders', [UserController::class, 'orders'])->name('userOrders');
        Route::get('/orderDetails/{id}', [UserController::class, 'orderDetails'])->name('userOrderDetails');

        // Profile.
        Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');

        // Logout.
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

    });
});

// End Frontend.



// Admins.
Route::group(['prefix' => '/admin'], function() {

    // LoginIf Middleware.
    Route::group(['middleware' => 'admin.guest'], function() {

        // Login.
        Route::get('/login', [AdminController::class, 'create'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'store'])->name('admin.store');

    });

    // Auth Middleware.
    Route::group(['middleware' => 'admin.auth'], function() {

        // Dashboard.
        Route::get('/panel', [DashboardController::class, 'dashboard'])->name('dashboard');

        // Categories.
        Route::get('/categoryCreate', [categoryController::class, 'create'])->name('category.create');
        Route::post('/categoryStore', [categoryController::class, 'store'])->name('category.store');
        Route::get('/categories',[categoryController::class, 'list'])->name('category.list');
        Route::get('/categoryEdit/{id}', [categoryController::class, 'edit'])->name('category.edit');
        Route::put('/categoryUpdate/{id}', [categoryController::class, 'update'])->name('category.update');
        Route::delete('/categoryDelete/{id}', [categoryController::class, 'destroy'])->name('category.delete');

        // Tempary-Images-Route.
        Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('temp-images.create');

        // SubCategories.
        Route::get('/SubCategoryCreate', [SubCategoryController::class, 'create'])->name('sub-category.create');
        Route::post('/SubCategoryStore', [SubCategoryController::class, 'store'])->name('sub-category.store');
        Route::get('/SubCategories', [SubCategoryController::class, 'list'])->name('sub-category.list');
        Route::get('/SubCategoryEdit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
        Route::put('/SubCategoryUpdate/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
        Route::delete('/SubCategoryDelete/{id}', [SubCategoryController::class, 'destroy'])->name('sub-category.delete');

        // Brands.
        Route::get('/brands', [BrandsController::class, 'index'])->name('brands.index'); // create.
        Route::get('/brandFetch', [BrandsController::class, 'fetch'])->name('fetch.brands'); // list.
        Route::post('/brandStore', [BrandsController::class, 'store'])->name('brands.store');
        Route::get('/brandEdit/{id}', [BrandsController::class, 'edit'])->name('brands.edit');
        Route::put('/brandUpdate/{id}', [BrandsController::class, 'update'])->name('brands.update');
        Route::delete('/brandDelete/{id}', [BrandsController::class, 'destroy'])->name('brands.delete');

        // Products.
        Route::get('/productCreate', [ProductController::class, 'create'])->name('product.create');
        Route::post('/productStore', [ProductController::class, 'store'])->name('product.store');
        Route::get('/productSubCategories', [ProductSubCategoryController::class, 'check'])->name('product.subcategories.index');
        Route::get('/products', [ProductController::class, 'list'])->name('product.list');
        Route::get('/productEdit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/productUpdate/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/productDelete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::get('/productGetProducts', [ProductController::class, 'getproducts'])->name('getproducts');

        // ProductImages.
        Route::post('/products-images/update/{product_id}', [ProductImageController::class, 'update'])->name('product-images.update');
        Route::delete('/products-images', [ProductImageController::class, 'destroy'])->name('product-images.delete');

        // Shipping.
        Route::get('/shippings', [ShippingChargesController::class, 'index'])->name('shipping.index');
        Route::get('/shippingsList', [ShippingChargesController::class, 'list'])->name('shipping.list');
        Route::post('/shippingStore', [ShippingChargesController::class, 'store'])->name('shipping.store');
        Route::get('/shippingEdit/{id}', [ShippingChargesController::class, 'edit'])->name('shipping.edit');
        Route::put('/shippingUpdate/{id}', [ShippingChargesController::class, 'update'])->name('shipping.update');
        Route::delete('/shippingDelete/{id}', [ShippingChargesController::class, 'destroy'])->name('shipping.delete');

        // Orders.
        Route::get('/orders', [OrdersController::class, 'index'])->name('adminOrders'); //List.
        Route::get('/orders/{id}', [OrdersController::class, 'detail'])->name('adminOrdersId');
        Route::post('/orderStatus/{id}', [OrdersController::class, 'orderStatus'])->name('orderStatusId');

        // Discount Coupons.
        Route::get('/disountCouponsCreate', [DiscountCouponsController::class, 'create'])->name('disountCouponsCreate');
        Route::post('/disountCouponsStore', [DiscountCouponsController::class, 'store'])->name('disountCouponsStore');
        Route::get('/disountCoupons', [DiscountCouponsController::class, 'index'])->name('discountCoupons');
        Route::get('/discountCouponsEdit/{id}', [DiscountCouponsController::class, 'edit'])->name('discountCouponsEdit');
        Route::put('/discountCouponsUpdate/{id}', [DiscountCouponsController::class, 'update'])->name('discountCouponsUpdate');
        Route::delete('/discountCouponsDelete/{id}', [DiscountCouponsController::class, 'destroy'])->name('discountCouponsDelete');
        
        // Logout.
        Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

        // AutoGenerate Slug.
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

    }); // End Admin Middleware Routes.
}); // End Admin Routes.

// End Admins.
