<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DanhMucSpController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\KhuyenMaiController;
use App\Http\Controllers\Admin\HoaDonController;

use App\Http\Controllers\Admin\CthdController;
use App\Http\Controllers\Admin\GioHangController;

use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\ThanhToanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ForgotPasswordController as ControllersForgotPasswordController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PusherController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// REGISTER + LOGIN
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp']);
Route::post('/verify-otp-password', [ForgotPasswordController::class, 'verifyOtp']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/forgot-password', [ForgotPasswordController:: class, 'forgot_password']);
Route::post('/reset-password', [ForgotPasswordController::class, 'reset_password']);
// api admin
// category 

Route::apiResource('categories', DanhMucSpController::class);
Route::post('/categories/create', [DanhMucSpController::class, 'store']);
Route::get('/getproductpicforcategory', [DanhMucSpController::class, 'productPicforCategory']);

// product
Route::apiResource('products', SanPhamController::class);
Route::get('/products/get-random-pic/{id}', [SanPhamController::class, 'getRandomPic']);
Route::get('/products/get-similar-products/carId={carId}&count={count}', [SanPhamController::class, 'getSimilarProducts']);
Route::get('/products/get-random-products/{count}', [SanPhamController::class, 'getRandomProducts']);
Route::get('/products/category-id/{id}', [SanPhamController::class, 'getProductsByCategoryId']);
Route::get('/products/getlastpage/{pagesize}', [SanPhamController::class, 'getLastPage']);
Route::get('/products/paginate/{pagesize}', [SanPhamController::class, 'paginate']);
// SEARCH PRODUCT BY KEYWORD + PRICE
Route::get('/search', [SanPhamController::class, 'searchProducts']);
Route::get('/getMaxPrice', [SanPhamController::class, 'layGiaLonNhat']);

Route::get('/getListThuongHieu', [SanPhamController::class, 'getThuongHieu']);

// UPDATE SL -1 (FOR PAYMENT)
Route::put('/products/decrease/{id}&{num}', [SanPhamController::class, 'decrement']);

// discount
Route::apiResource('discounts', KhuyenMaiController::class);
Route::get('/discounts/type/{type}', [KhuyenMaiController::class, 'getDiscountsByType']);

// bill
Route::apiResource('bills', HoaDonController::class)->except('delete');
Route::get('/bills/status/{status}', [HoaDonController::class, 'getBillsByOrderStatus']);
Route::get('/bills/paymentStatus/{status}', [HoaDonController::class, 'getBillsByPaymentStatus']);

Route::get('/bills/getlastpage/{status}', [HoaDonController::class, 'getLastPage']);
Route::get('/bills/makh/{id}', [HoaDonController::class, 'getBillsByCustomerId']);
Route::get('/bills/paginate/{pagesize}', [HoaDonController::class, 'paginate']);

// bill-details
Route::apiResource('bill-details', CthdController::class)->except('update', 'destroy');
Route::get('/bill-details/mahd/{id}', [CthdController::class, 'getBillDetailsByBillId']);

// cart
Route::apiResource('carts', GioHangController::class);
Route::get('/carts/makh/{id}', [GioHangController::class, 'getCartsByCustomerId']);
Route::get('/cart-detail/makh/{makh}', [GioHangController::class, 'getCartDetailByCustomerId'])->name('checkout');
Route::put('/carts/update-quantity/{id}', [GioHangController::class, 'putQuantityByCartId']);
Route::post('/insert-cart', [GioHangController::class, 'insertCart']);

// customer 
Route::apiResource('customers', KhachHangController::class)->except('store', 'destroy');
Route::get('/customers/getlastpage/{pagesize}', [KhachHangController::class, 'getLastPage']);
Route::get('/customers/email/{email}', [KhachHangController::class, 'getCustomersByEmail']);

// API STAFF
// Route::prefix('customer')->middleware(['auth', 'isAdmin'])->group(function () {

Route::apiResource('staffs', NhanVienController::class);
Route::get('/staffs/email/{email}', [NhanVienController::class, 'getStaffsByEmail']);

// SEARCH PRODUCT BY KEYWORD + PRICE
Route::get('/search', [SanPhamController::class, 'searchProducts']);

// UPDATE SL (FOR PAYMENT)
Route::put('/payment/{productId}/update-quantity', [ThanhToanController::class, 'updateQuantity']);

// CHANGE PASSWORD
Route::post('/profile/change-password', [UserController::class, 'change_password'])->middleware('auth:sanctum');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

// chatbot
Route::apiResource('chat', ChatController::class);
Route::get('/chat/cus-id/{id}', [ChatController::class, 'getChatsByCustomerId']);
Route::get('/chatlist', [ChatController::class, 'getCustomerChat']);
Route::put('/update-chat/{cus_id}', [ChatController::class, 'updateChat']);

Route::get('/sendmessage', [PusherController::class, 'sendMessage']);

Route::get('/top-products', [CthdController::class, 'getTopProducts']);

