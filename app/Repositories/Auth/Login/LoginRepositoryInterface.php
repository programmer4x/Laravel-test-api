<?php

namespace App\Repositories\Auth\Login;

interface LoginRepositoryInterface
{
    public function existUser($request);
    public function updateToken($user,$token);
}
