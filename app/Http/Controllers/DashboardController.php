<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;



class DashboardController extends Controller
{
    public function __invoke()
  
    {
/** @var user $user */

        $user = auth()->user();


        return view('dashboard',[
        'links' => $user->links,

    ]); 
    }
}
