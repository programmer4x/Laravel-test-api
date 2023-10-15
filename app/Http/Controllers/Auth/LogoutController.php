<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\LogoutServices;
use Illuminate\Routing\Controller;

class LogoutController extends Controller
{
    protected object $logoutServices ;

    public function __construct(LogoutServices $logoutServices)
    {
        $this->logoutServices = $logoutServices;
    }


    public function logout()
    {
        return $this->logoutServices->logout();
    }
}
