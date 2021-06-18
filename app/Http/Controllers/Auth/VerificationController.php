<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function resend(Request $request)
    {
       
        if ($request->user()->hasVerifiedEmail()) {
            return response(['message' => 'Email already verified']);
        }

        $request->user()->sendEmailVerificationNotification();

        return response(['status' => 'verification-link-sent']);
    }
}