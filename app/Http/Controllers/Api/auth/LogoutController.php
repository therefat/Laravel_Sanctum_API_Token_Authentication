<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __construct()
    {
//        $this->middleware(['auth:sanctum']);
//        $this->middleware('auth:sanctum');

    }

    public function __invoke(Request $request)
    {
        //
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Token Revoked'],200);
    }
}
