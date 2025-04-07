<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Auth\LoginRepository;

class LoginController extends BaseController
{
    private $repo;

    function __construct()
    {
        $this->repo = new LoginRepository();
    }
    public function login(Request $request)
    {
        // $res = $this->repo->login($request->validated());
        $res = $this->repo->login($request);

        $res['token1'] =  $request->ips();


        if ($res['status']) return $this->sendResponse($res, 'login successfully.'); 
        return $this->sendError($res, 'Login Failed please check your email and password.', $res['code']);
    }
    public function logout()
    {
        $this->repo->logout();
    }
}
