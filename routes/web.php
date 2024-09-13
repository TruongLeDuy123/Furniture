<?php

use App\Http\Controllers\Admin\GioHangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\KhuyenMaiController;
use App\Http\Controllers\Admin\HoaDonController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\GoogleAuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();

// customer 
Route::get('/', function () {
    return view('customer/landing-page');
})->name('landing-page');

Route::get('/about-us', function () {
    return view('customer/about-us');
})->name('about-us');

Route::get('/cart-information', function () {
    return view('customer/cart-information');
})->name('cart-information');

Route::get('/contact-page', function () {
    return view('customer/contact-page');
})->name('contact');

Route::get('/detail-product-page', function () {
    return view('customer/detail-product-page');
})->name('detail-product');

Route::get('/login-register', function () {
    return view('customer/login-register');
})->name('login-register');

Route::get('/payment-page', function () {
    return view('customer/payment-page');
})->name('payment');

Route::get('/product-page', function () {
    return view('customer/product-page');
})->name('product');

Route::get('/profile-page', function () {
    return view('customer/profile-page');
})->name('profile');

// admin
// staff
Route::get('/staff_manager', function () {
    return view('admin/admin_staff/index');
})->name('staff_manager');

Route::get('/create_staff', function () {
    return view('admin/admin_staff/create');
})->name('create_staff');

Route::get('/detail_staff', function () {
    return view('admin/admin_staff/detail');
})->name('detail_staff');

Route::get('/edit_staff', function () {
    return view('admin/admin_staff/edit');
})->name('edit_staff');

Route::get('/change-password', function () {
    return view('admin/admin_staff/change-password');
})->name('change-password');

// customer
Route::get('/customer_manager', function () {
    return view('admin/admin_customer/index');
})->name('customer_manager');

Route::get('/detail_customer', function () {
    return view('admin/admin_customer/detail');
})->name('detail_customer');

// product
Route::get('/product_manager', function () {
    return view('admin/admin_product/index');
})->name('product_manager');

Route::get('/edit_product', function () {
    return view('admin/admin_product/edit');
})->name('edit_product');

Route::get('/detail_product', function () {
    return view('admin/admin_product/detail');
})->name('detail_product');

Route::get('/create_product', function () {
    return view('admin/admin_product/create');
})->name('create_product');

// bill
Route::get('/bill_manager', function () {
    return view('admin/admin_bill/index');
})->name('bill_manager');

Route::get('/detail_bill', function () {
    return view('admin/admin_bill/detail');
})->name('detail_bill');

Route::get('/edit_bill', function () {
    return view('admin/admin_bill/edit');
})->name('edit_bill');

// categories
Route::get('/categories_manager', function () {
    return view('admin/admin_categories/index');
})->name('categories_manager');

Route::get('/edit_category', function () {
    return view('admin/admin_categories/edit');
})->name('edit_category');

Route::get('/detail_category', function () {
    return view('admin/admin_categories/detail');
})->name('detail_category');

Route::get('/create_category', function () {
    return view('admin/admin_categories/create');
})->name('create_category');

// discount 
Route::get('/discount_manager', function () {
    return view('admin/admin_discount/index');
})->name('discount_manager');

Route::get('/detail_discount', function () {
    return view('admin/admin_discount/detail');
})->name('detail_discount');

Route::get('/edit_discount', function () {
    return view('admin/admin_discount/edit');
})->name('edit_discount');

Route::get('/create_discount', function () {
    return view('admin/admin_discount/create');
})->name('create_discount');

Route::get('/chatbox', function () {
    return view('admin/chatbox/index');
})->name('chatbox');

Route::get('payment-page', [PaymentController::class, 'createTransaction']);
Route::post('process-Transaction', [PaymentController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-Transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');
// Route::get('/cart-detail/makh/{makh}', [GioHangController::class, 'getCartDetailByCustomerId'])->name('checkout');

//Chart
Route::get('/chart_manager', function () {
    return view('admin/admin_charts/index');
})->name('chart_manager');

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
