<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginRepository extends Controller
{
    public function login($data)
    {
        try {
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                Cache::flush();
                Auth::user()->tokens()->delete();
                $user = Auth::user();
                $res['list'] = [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                    ],
                ];
                $res['code'] = 200;
                $res['status'] = true;
                return $res;
            } else {
                $res['title'] = 'Login Failed';
                $res['message'] = 'Login Failed please check your email and password.';
                $res['code'] = 401;
                $res['status'] = false;
                return $res;
            }
        } catch (\Exception $e) {
            $res['err'] = $e->getMessage();
            $res['status'] = false;
            $res['code'] = 500;
            return $res;
        }
    }
    public function logout()
    {
        Cache::flush();
        Auth::user()->tokens()->delete();
    }
}
