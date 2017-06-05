<?php

namespace App;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
  protected static function boot(){
    parent::boot();
    static::addGlobalScope(new UserScope);
  }

  public function categoria(){
    return $this->belongsTo('App\Categoria');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
