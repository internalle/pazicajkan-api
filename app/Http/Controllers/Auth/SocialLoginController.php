<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SocialLoginController extends Controller
{
    public function login(Request $request) {
        return $request->data();
    }
}
