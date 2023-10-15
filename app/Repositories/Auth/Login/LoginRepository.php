<?php

namespace App\Repositories\Auth\Login;

use App\Models\User;

class LoginRepository implements LoginRepositoryInterface
{

    public function existUser($request)
    {
        return User::where('email',$request->email);
    }

    public function updateToken($user,$token)
    {
        return $user->update(['api_token' => $token]);
    }
}
