<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;



class DashboardController extends Controller
{
    public function __invoke()
  
    {
/** @var User $user */
        $user = auth()->user();

        dd($user->with('links'));

        return view('dashboard'); 
    }
}
