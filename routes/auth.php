<?php

use App\Http\Controllers\Api\auth\LoginController;
use Illuminate\Support\Facades\Route;
Route::post('login', LoginController::class);
