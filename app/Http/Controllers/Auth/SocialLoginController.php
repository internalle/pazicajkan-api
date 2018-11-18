<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLoginRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class SocialLoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->get('email');
        $name = $request->get('name');

        if (!empty($email) && !empty($name)) {
            $user = User::where('email', $email)->first();

            if (is_null($user)) {

                User::insert([
                    'email' => $email,
                    'name' => $name,
                    'platform' => 'FACEBOOK',
                    'platform_id' => 'test',
                    'email_verified_at' => Carbon::now()->toDateTimeString()
                ]);
            }

            return [
                'success' => true
            ];
        }

        return [
            'success' => false
        ];
    }
}
