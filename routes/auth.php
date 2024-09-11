<?php

use App\Http\Controllers\Api\auth\LoginController;
use App\Http\Controllers\Api\auth\LogoutController;
use App\Http\Controllers\Api\auth\PasswordRestController;
use App\Http\Controllers\Api\auth\RegisterController;
use App\Http\Controllers\Api\auth\verifyEmailController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class)->middleware('auth:sanctum');;
Route::post('register', RegisterController::class);
Route::post('password/email',[PasswordRestController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset',[PasswordRestController::class,'reset'])->middleware('signed')->name('password.reset');
Route::post('email/verify/send',[verifyEmailController::class,'sendEmail'])->middleware('auth:sanctum')->name('verification.send');
Route::post('email/verify',[VerifyEmailController::class,'verify'])->middleware('auth:sanctum','signed')->name('verify-email');
Route::get('user',[UserController::class])->middleware('auth:sanctum');
Route::get('dashboard',[DashboardController::class])->middleware('auth:sanctum');
