<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    public function __invoke()

    {
        /** @var user $user */

        $user = Auth::user();


        return view('dashboard', [
            'links' => $user->links()->orderBy('sort')
                ->get()

        ]);
    }
}
