<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\CouponApiController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PartnerAuthController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// ---------- TEST ----------

Route::get('/test123', function () {

    return response()->json([
        'message' => 'TEST WORKS'
    ]);

});

// ---------- AUTH ----------

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

// ---------- PARTNERS ----------

Route::post('/partner/register', [PartnerAuthController::class, 'register']);
Route::post('/partner/login', [PartnerAuthController::class, 'login']);
Route::post('/partner/products', [ProductApiController::class, 'store']); 
Route::get('/partner/products', [ProductApiController::class, 'partnerIndex']);
Route::delete('/partner/products/{id}', [ProductApiController::class, 'destroy']);
Route::match(['POST', 'PUT'], '/partner/products/{id}', [ProductApiController::class, 'update']);

// ---------- PUBLIC ----------

// products
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}', [ProductApiController::class, 'show']);
// categories
Route::get('/categories', [CategoryController::class, 'index']);

// cart
Route::get('/cart', [CartApiController::class, 'index']);
Route::post('/cart/add', [CartApiController::class, 'add']);
Route::post('/cart/update/{id}', [CartApiController::class, 'update']);
Route::delete('/cart/remove/{id}', [CartApiController::class, 'remove']);

// ---------- PROTECTED ----------

Route::middleware('auth:sanctum')->group(function () {

    // auth
    Route::get('/me', [ApiAuthController::class, 'me']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);

    // profile
    Route::post('/user/update', [ProfileApiController::class, 'updateUser']);

    // orders
    Route::get('/orders', [ProfileApiController::class, 'orders']);

    // addresses
    Route::get('/addresses', [ProfileApiController::class, 'addresses']);
    Route::post('/addresses', [ProfileApiController::class, 'addAddress']);
    Route::put('/addresses/{id}', [ProfileApiController::class, 'updateAddress']);
    Route::delete('/addresses/{id}', [ProfileApiController::class, 'deleteAddress']);
    Route::post('/user/change-password', [ProfileApiController::class, 'changePassword']);

    // bonuses
    Route::get('/bonuses', [ProfileApiController::class, 'bonuses']);

    // coupons
    Route::post('/coupons/check', [CouponApiController::class, 'check']);

});