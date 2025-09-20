<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyMobileController extends Controller
{
    public function verifyMobile()
    {
        return view('frontend.auth.verify_mobile');
    }
}
