<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class verifyEmailController extends Controller
{
    //
    public function sendEmail()
    {
        Mail::to(auth()->user())->send(new EmailVerification(auth()->user()));
        return response()->json(['message' => 'Email sent.',"user" => auth()->user()]);
    }
    public function verify(Request $request){
        if(!$request->user()->email_verified_at){
            $request->user()->forceFill([
                'email_verified_at' => now(),
            ])->save();
        }
        return response()->json(['message' => 'Email verified.']);
    }

}
