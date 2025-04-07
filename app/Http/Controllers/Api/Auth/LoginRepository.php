<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginRepository
{
    public function login($data)
    {
        try {
            if(Auth::attempt(['email' => $data['email'],'password' => $data['password']]) || 
            Auth::attempt(['account_number' => $data['email'],'password' => $data['password']]))
            {
                Auth::logoutOtherDevices($data['password']);
                Cache::flush();
                Auth::user()->tokens()->delete();
                $user = Auth::user();
                $res['list'] = [
                    'user' => [
                        'name' => $user->name,
                    ],
                    'token' => $user->createToken('ApiToken for'.$user->name,['*'],now()->addMinutes(5))->plainTextToken,
                    
                ];
                $res['code'] = 200;
                $res['status'] = true;
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
