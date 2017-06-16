<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Request;

class UserScope implements Scope{
  public function apply(Builder $builder, Model $model){
    $user_id = Auth::user()->id;
    if(Request::wantsJson()){
      $user_id = Request::user()->id;
    }
    $builder->where('user_id', '=', $user_id);
  }
}
