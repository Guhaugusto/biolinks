<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Link;

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
  public function edit(link $link)
  {
    if ($link->user_id !== auth::id()) {
      return redirect()->route('dashboard')
        ->with('messagem', 'Você não tem permissão para editar este link.');
    }
    
 
    return view('links.edit', compact('link'));
  }

  /**
   * Update the specified resource in storage.
   */public function update(UpdateLinkRequest $request, Link $link)
{
  $link->update($request->only(['link', 'name']));

  return to_route('dashboard')
      ->with('message', 'Updated successfully ✅');
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

  public function up(Link $link)
  {
      $order = $link->sort;
      $newOrder = $order - 1;
  
      /** @var User $user */
      $user = Auth::user();
  
      $swapWith = $user->links()->where('sort', '=', $newOrder)->first();
  
      if ($swapWith) {
          $link->fill(['sort' => $newOrder])->save();
          $swapWith->fill(['sort' => $order])->save();
      }
  
      return back();
  }
  
  public function down(Link $link)
  {
      $order = $link->sort;
      $newOrder = $order + 1; // Fix: going "down" should increase sort order
  
      /** @var User $user */
      $user = Auth::user();
  
      $swapWith = $user->links()->where('sort', '=', $newOrder)->first();
  
      if ($swapWith) {
          $link->fill(['sort' => $newOrder])->save();
          $swapWith->fill(['sort' => $order])->save();
      }
  
      return back();
  }
}
