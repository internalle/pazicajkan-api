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
        //stupid need to be refactored
        $email = $request->get('email');
        $name = $request->get('name');
        $platform = $request->get('platform');
        $platform_id = $request->get('platform_id');

        if (!empty($email) && !empty($name)) {
            $user = User::where('email', $email)->first();

            if (is_null($user)) {
                $user = User::create([
                    'email' => $email,
                    'name' => $name,
                    'platform' => $platform,
                    'platform_id' => $platform_id,
                    'email_verified_at' => Carbon::now()->toDateTimeString()
                ]);
            }

            return [
                'success' => true,
                'user_id' => $user['id']
            ];
        }

        return [
            'success' => false
        ];
    }
}
