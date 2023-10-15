<?php

namespace App\Services\Auth;

use App\Repositories\Auth\Login\LoginRepository;
use App\Repositories\Auth\Login\LoginRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    private object $loginRepository;

    public function __construct()
    {
        $this->loginRepository = app()->make(LoginRepositoryInterface::class);
    }

    public function login($request)
    {
        $token = Auth::attempt($request->only('email','password'));
        $user  = $this->loginRepository->existUser($request);
        $this->loginRepository->updateToken($user,$token);

        if (!$token) {
            return response([
                'massage' => 'email or password is false',
                'status'  => 'error',
            ], 401);
        }
        return Auth::user() ;
    }
}
