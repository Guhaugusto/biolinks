<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(MakeLoginRequest $request)
{

    if ($request->Attempt()){

        return to_route('dashboard');

    }

    return back()->with(['messagem' => 'não deu certo!!']);

}
}
