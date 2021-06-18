<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/user', [AuthController::class, 'authenticatedUser']);
   Route::post('/logout', [AuthController::class, 'logout']); 
   Route::get('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendPasswordResetLink']);
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');


Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');