@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <ul>
        <li>
          <a href="{{route('listar_objetos')}}">Listar Objetos</a>
        </li>
        <li>
          <a href="{{route('criar_objeto')}}">Criar Objeto</a>
        </li>
        <li>
          <a href="{{route('listar_categorias')}}">Listar Categorias</a>
        </li>
        <li>
          <a href="{{route('criar_categoria')}}">Criar Categoria</a>
        </li>
      </ul>

    </div>
  </div>
</div>
@endsection
