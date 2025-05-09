<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use App\Models\User;


class ProfileController extends Controller
{

    public function index()
    {
        return view(
            'profile',
            [
                'user' => auth::user()

            ]
        );
    }
    public function update(ProfileRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $data = $request->validated();

        /** @var UploadedFile $file */

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos');
        }




        $user->fill($data)->save();
        return to_route('dashboard')
            ->with('message', 'Profile atualizado com sucesso');
    }
}
