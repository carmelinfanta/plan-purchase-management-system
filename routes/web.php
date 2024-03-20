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
Route::get('/register', [UserAuthController::class, 'register'])->middleware('alreadyLoggedIn');
Route::post('/register-user', [UserAuthController::class, 'registerUser'])->middleware('alreadyLoggedIn');
Route::post('/login-user', [UserAuthController::class, 'loginUser']);
Route::get('/dashboard', [UserAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/signout', [UserAuthController::class, 'signout'])->middleware('isLoggedIn');
Route::post('/checkout/{id}', [PlanController::class, 'checkout']);
Route::get('/purchasedPlans', [PlanController::class, 'purchasedPlans'])->middleware('isLoggedIn');
Route::get('/paymentSuccess', [PlanController::class, 'paymentSuccess'])->middleware('isLoggedIn');
Route::get('/transaction', [PlanController::class, 'transaction'])->middleware('isLoggedIn');
Route::get('/profile', [PlanController::class, 'profile'])->middleware('isLoggedIn');
Route::post('/webhook', [StripeController::class, 'webhook']);
Route::post('/checkout', [StripeController::class, 'checkoutSession']);
