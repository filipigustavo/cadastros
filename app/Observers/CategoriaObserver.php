<?php

namespace App\Observers;

use App\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaObserver{

  /**
  * @param Categoria $categoria
  * @return void
  */
  public function deleting(Categoria $categoria){
    $categoria->objetos()->delete();
  }

}
