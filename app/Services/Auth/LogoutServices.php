<?php

namespace App\Services\Auth;

use App\Repositories\Auth\Logout\LogoutRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LogoutServices
{
    protected object $logoutRepository;

    public function __construct()
    {
        $this->logoutRepository = app()->make(LogoutRepositoryInterface::class);
    }

    public function logout()
    {
        Auth::logout();
        return response([
            'status'  => 'success',
            'message' => 'Successfully logged out',
        ]);
    }
}
