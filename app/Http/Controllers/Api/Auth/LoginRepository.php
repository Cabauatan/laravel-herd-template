<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginRepository
{
    public function login($data)
    {
        try {
            if(Auth::attempt(['email' => $data['email'],'password' => $data['password']],$data['remember']) || 
            Auth::attempt(['account_number' => $data['email'],'password' => $data['password']],$data['remember']))
            {
                Auth::logoutOtherDevices($data['password']);
                Cache::flush();
                Auth::user()->tokens()->delete();
                $user = Auth::user();
                $res['list'] = [
                    'user' => [
                        'name' => $user->name,
                    ],
                ];
                $res['token'] = $user->createToken('ApiToken for '.$user->name,['*'],now()->addMinute())->plainTextToken;
                $res['code'] = 200;
                $res['status'] = true;
                $res['ip'] = $data->ip();
                return $res;
            }
            else {
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
    public function logout($request)
    {
        Cache::flush();
        Auth::user()->tokens()->delete();
        $request->session()->invalidate();
    }
}
