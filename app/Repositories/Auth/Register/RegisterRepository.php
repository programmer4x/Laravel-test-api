<?php

namespace App\Repositories\Auth\Register;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterRepository implements RegisterRepositoryInterface
{
    public function createUser($request)
    {
    return User::create([
        'name'     => $request->name,
        'username' => $request->username,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
    ]);
    }

    public function createToken($user, $token)
    {
        $user->update([
            'api_token' => $token,
        ]);

        return User::find('email' , "$user->email")->api_token;
    }
}
