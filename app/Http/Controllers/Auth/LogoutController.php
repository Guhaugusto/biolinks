<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;


class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::logout();
        session()->invalidade();

        return to_route('login');

    }
}
