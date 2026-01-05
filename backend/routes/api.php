<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\CouponApiController;
use App\Http\Controllers\Api\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --- Аутентификация ---
Route::post('/login', [ApiAuthController::class, 'login']);

// Маршруты, доступные только авторизованным пользователям
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [ApiAuthController::class, 'me']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);

    // Профиль / Пользователь
    Route::get('/user', [ProfileApiController::class, 'user']);
    Route::post('/user/update', [ProfileApiController::class, 'updateUser']);
    Route::get('/orders', [ProfileApiController::class, 'orders']);
    Route::get('/addresses', [ProfileApiController::class, 'addresses']);
    Route::post('/addresses', [ProfileApiController::class, 'addAddress']);
    Route::delete('/addresses/{id}', [ProfileApiController::class, 'deleteAddress']);
    Route::get('/bonuses', [ProfileApiController::class, 'bonuses']);

    // Промокоды (только авторизованные)
    Route::post('/coupons/check', [CouponApiController::class, 'check']);
});

// --- Корзина (тестовый режим — без авторизации) ---
Route::get('/cart', [CartApiController::class, 'index']);
Route::post('/cart/add', [CartApiController::class, 'add']);
Route::post('/cart/update/{id}', [CartApiController::class, 'update']);
Route::delete('/cart/remove/{id}', [CartApiController::class, 'remove']);

// Продукты (доступ без токена)
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}', [ProductApiController::class, 'show']);
Route::post('/products', [ProductApiController::class, 'store']);
