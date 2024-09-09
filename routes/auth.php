<?php

use App\Http\Controllers\Api\auth\LoginController;
use App\Http\Controllers\Api\auth\LogoutController;
use Illuminate\Support\Facades\Route;
Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class)->middleware('auth:sanctum');;
