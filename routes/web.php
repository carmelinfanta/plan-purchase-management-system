<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\StripeController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('webhook',function(){
    return 'ok';
});

Route::get('/login', [UserAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/register', [UserAuthController::class, 'register']);
Route::post('/register-user', [UserAuthController::class, 'registerUser']);
Route::post('/login-user', [UserAuthController::class, 'loginUser']);
Route::get('/dashboard', [UserAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/signout', [UserAuthController::class, 'signout']);
Route::post('/checkout/{id}', [PlanController::class, 'checkout']);
Route::get('/purchasedPlans', [PlanController::class, 'purchasedPlans'])->middleware('isLoggedIn');
Route::get('/stripe', [StripeController::class, 'stripe']);
Route::post('/stripe', [StripeController::class, 'stripePost'])->name('stripe.post')->middleware('isLoggedIn');
Route::post('/purchase-info', [PlanController::class, 'purchaseInfo']);
Route::get('/paymentSuccess', [PlanController::class, 'paymentSuccess'])->middleware('isLoggedIn');
Route::get('/transaction', [PlanController::class, 'transaction']);
Route::get('/profile', [PlanController::class, 'profile']);


