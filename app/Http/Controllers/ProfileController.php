<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;


class ProfileController extends Controller
{

    public function index()
    {
        return view('profile',
            [
                'user' => auth::user()
               
            ]
        );

    }
    public function update( ProfileRequest $request)
    {
        $user = auth::user();

        $data = $request->validated();

         /** @var  UploadedFile*/  

      if(  $file = $request->photo){

        $data['photo'] = $file->store('photos');
      }
      


        $user->fill($data)->save();
        return back()
            ->with('menssagem', 'Profile atualizado com sucesso');
        
    }
}
