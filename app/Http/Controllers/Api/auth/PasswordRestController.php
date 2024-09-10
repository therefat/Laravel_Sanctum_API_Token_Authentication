<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkEmailRequest;
use App\Http\Requests\PasswordRequest;
use App\Mail\RestPasswordLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Exception;

class PasswordRestController extends Controller
{
    //
    public function sendResetLinkEmail(LinkEmailRequest $request){
//
        $url = \URL::temporarySignedRoute('password.reset',now()->addMinutes(30),['email'=> $request->get('email')]);
        Mail::to($request->email)->send(new RestPasswordLink($url));

        return response()->json([
            "message" => "We have sent a link to your email address if it exists in our system.",
            200
        ]);

    }
    public function reset(PasswordRequest $request)
    {
        $user = User::where($request->email)->first();
        if(!$user){
            return response()->json([
                "message" => "User not found.",

            ],200);

        }
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            "message" => "Password reset successfully.",
        ]);
    }
}
