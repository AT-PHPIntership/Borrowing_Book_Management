<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController as Auth;

class AuthController extends Auth
{
    protected $guard = 'web';
    protected $loginView = 'frontend/auth/login';
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/';
}
