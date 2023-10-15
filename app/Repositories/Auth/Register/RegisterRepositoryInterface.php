<?php

namespace App\Repositories\Auth\Register;

interface RegisterRepositoryInterface
{
    public function createUser($request);
    public function createToken($user, $token);
}
