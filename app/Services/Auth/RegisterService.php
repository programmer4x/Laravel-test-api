<?php

namespace App\Services\Auth;

use App\Repositories\Auth\Register\RegisterRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class RegisterService
{
    private object $registerRepository;

    public function __construct()
    {
        $this->registerRepository = app()->make(RegisterRepositoryInterface::class);
    }

    public function register($request)
    {
        $user = $this->registerRepository->createUser($request);
        $token = Auth::login($user);
        return $this->registerRepository->createToken($user,$token);
    }
}
