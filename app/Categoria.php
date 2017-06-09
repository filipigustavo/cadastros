<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $fillable = ['name'];

  public function objetos(){
    return $this->hasMany('App\Objeto');
  }
}
