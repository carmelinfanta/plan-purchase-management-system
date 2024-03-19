<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;
use App\Models\transaction;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [UserAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/register', [UserAuthController::class, 'register']);
Route::post('/register-user', [UserAuthController::class, 'registerUser']);
Route::post('/login-user', [UserAuthController::class, 'loginUser']);
Route::get('/dashboard', [UserAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/signout', [UserAuthController::class, 'signout']);
Route::post('/checkout/{id}', [PlanController::class, 'checkout']);
Route::get('/purchasedPlans', [PlanController::class, 'purchasedPlans'])->middleware('isLoggedIn');
Route::get('/paymentSuccess', [PlanController::class, 'paymentSuccess']);
Route::get('/transaction', [PlanController::class, 'transaction']);
Route::get('/profile', [PlanController::class, 'profile']);
Route::post('/webhook', [StripeController::class, 'webhook']);
Route::post('/checkout', [StripeController::class, 'checkoutSession']);
