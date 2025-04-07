<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 442);
        }
        $res = $this->repo->login($request->all());

        if ($res['status']) return $this->sendResponse($res, 'login successfully.'); 
        return $this->sendError($res, 'Login Failed please check your email and password.', $res['code']);
    }
    public function logout(Request $request)
    {
        $this->repo->logout($request);
    }
}
