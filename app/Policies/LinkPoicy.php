<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;

use Illuminate\Auth\Access\Response;

class LinkPoicy
{
    
    public function atualizar(User $user, Link $link)
    {
        return $link->user->is($user);
    }
    
  
}
