<?php

use App\Http\Controllers\Api\auth\LoginController;
use App\Http\Controllers\Api\auth\LogoutController;
use App\Http\Controllers\Api\auth\PasswordRestController;
use App\Http\Controllers\Api\auth\RegisterController;
use Illuminate\Support\Facades\Route;
Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class)->middleware('auth:sanctum');;
Route::post('register', RegisterController::class);
Route::post('password/email',[PasswordRestController::class,'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset',[PasswordRestController::class,'reset'])->name('password.reset');
