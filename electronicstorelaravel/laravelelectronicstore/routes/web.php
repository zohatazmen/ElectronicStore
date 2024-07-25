<?php

use App\Http\Controllers\backend\AdminContactController;
use App\Http\Controllers\backend\AdminLoginController;
use App\Http\Controllers\backend\AdminRegistrationController;
use App\Http\Controllers\backend\ShopAdminController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\MyAccountController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\WishlistController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'submitMessage']);
Route::get('/login', [LoginController::class, 'index'])->name('account');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/my-account', [MyAccountController::class, 'showAccount'])->name('account');
    Route::post('/my-account', [MyAccountController::class, 'updateAccount'])->name('account.update');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
});

Route::get('/order', [OrderController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// Backend Routes

// routes/web.php

// For showing the form to add a new user
Route::get('admin/register', [AdminRegistrationController::class, 'registerAdmin'])->name('admin.register');

// For storing a new user
Route::post('admin/register', [AdminRegistrationController::class, 'submitAdminRecord'])->name('admin.store');

// For showing the form to edit an existing user
Route::get('admin/update/{id}', [AdminRegistrationController::class, 'editAdminRecord'])->name('admin.edit');

// For updating an existing user
Route::put('admin/update/{id}', [AdminRegistrationController::class, 'updateAdminRecord'])->name('admin.update');

// For listing all users
Route::get('admin/admins-list', [AdminRegistrationController::class, 'showAdminRecord'])->name('admin.index');
Route::delete('admin/delete/{id}', [AdminRegistrationController::class, 'deleteAdminRecord'])->name('admin.delete');

Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->name('admin.')->group(function () {

    // Authenticated Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', [AdminLoginController::class, 'dashboard'])->name('dashboard');
        Route::get('admin/users', [AdminLoginController::class, 'index'])->name('admin.users');
        Route::get('admin/users/{id}/edit', [AdminLoginController::class, 'edit'])->name('admin.users.edit');
        Route::put('admin/users/{id}', [AdminLoginController::class, 'update'])->name('admin.users.update');
        Route::delete('admin/users/{id}', [AdminLoginController::class, 'destroy'])->name('admin.users.destroy');
        // Shop Management Routes
        Route::get('shops', [ShopAdminController::class, 'index'])->name('shops.index');
        Route::get('shops/create', [ShopAdminController::class, 'create'])->name('shops.create');
        Route::post('shops', [ShopAdminController::class, 'store'])->name('shops.store');
        Route::get('shops/{shop}/edit', [ShopAdminController::class, 'edit'])->name('shops.edit');
        Route::put('shops/{shop}', [ShopAdminController::class, 'update'])->name('shops.update');
        Route::delete('shops/{shop}', [ShopAdminController::class, 'destroy'])->name('shops.destroy');

        // Order Management Routes
        Route::get('orders', [\App\Http\Controllers\backend\OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/create', [\App\Http\Controllers\backend\OrderController::class, 'create'])->name('orders.create');
        Route::post('orders', [\App\Http\Controllers\backend\OrderController::class, 'store'])->name('orders.store');
        Route::get('orders/{order}', [\App\Http\Controllers\backend\OrderController::class, 'show'])->name('orders.show');
        Route::get('orders/{order}/edit', [\App\Http\Controllers\backend\OrderController::class, 'edit'])->name('orders.edit');
        Route::put('orders/{order}', [\App\Http\Controllers\backend\OrderController::class, 'update'])->name('orders.update');
        Route::delete('orders/{order}', [\App\Http\Controllers\backend\OrderController::class, 'destroy'])->name('orders.destroy');

        // Wishlist Management Routes
        Route::get('wishlists', [\App\Http\Controllers\backend\AdminWishlistController::class, 'index'])->name('wishlists.index');
        Route::get('wishlists/create', [\App\Http\Controllers\backend\AdminWishlistController::class, 'create'])->name('wishlists.create');
        Route::post('wishlists', [\App\Http\Controllers\backend\AdminWishlistController::class, 'store'])->name('wishlists.store');
        Route::get('wishlists/{wishlist}', [\App\Http\Controllers\backend\AdminWishlistController::class, 'show'])->name('wishlists.show');
        Route::get('wishlists/{wishlist}/edit', [\App\Http\Controllers\backend\AdminWishlistController::class, 'edit'])->name('wishlists.edit');
        Route::put('wishlists/{wishlist}', [\App\Http\Controllers\backend\AdminWishlistController::class, 'update'])->name('wishlists.update');
        Route::delete('wishlists/{wishlist}', [\App\Http\Controllers\backend\AdminWishlistController::class, 'destroy'])->name('wishlists.destroy');

        // Contact Management Routes
        Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('contacts/create', [AdminContactController::class, 'create'])->name('contacts.create');
        Route::post('contacts', [AdminContactController::class, 'store'])->name('contacts.store');
        Route::get('contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::get('contacts/{id}/edit', [AdminContactController::class, 'edit'])->name('contacts.edit');
        Route::put('contacts/{id}', [AdminContactController::class, 'update'])->name('contacts.update');
        Route::delete('contacts/{id}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    });
});
