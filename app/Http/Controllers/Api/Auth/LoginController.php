<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Api\Auth\LoginRepository;

class LoginController extends BaseController
{
    private $repo;

    function __construct()
    {
        $this->repo = new LoginRepository();
    }
    public function login(LoginRequest $request)
    {
        $res = $this->repo->login($request->validated());
        if ($res['status']) return $this->sendResponse($res, 'login successfully.'); 
        return $this->sendResponse($res, 'Login Failed please check your email and password.', $res['code']);
    }
    public function logout()
    {
        $this->repo->logout();
    }
}
