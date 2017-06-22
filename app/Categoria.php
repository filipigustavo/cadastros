<?php

namespace App;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $fillable = ['name'];

  protected static function boot(){
    parent::boot();
    static::addGlobalScope(new UserScope);
  }

  public function objetos(){
    return $this->hasMany('App\Objeto');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
