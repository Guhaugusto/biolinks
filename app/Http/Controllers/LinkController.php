<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;

class LinkController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {

      /** @var User $user */
       
        $validated = $request->validated();
    
     
        $data = array_merge($validated, ['user_id' =>
        auth::id()]);
    
        
        Link::create($data);
    
       
        return to_route('dashboard');
    }
    
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( link $link)
    {
       return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
      $link->link = $request->link;
      $link->name = $request->name;
      $link->save();



      return to_route('dashboard')
      ->with('messagem', 'Alterado com sucessso👌');


     
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return to_route('dashboard')
        ->with('messagem', 'Deletado com sucessso🗑️');
    }
}
