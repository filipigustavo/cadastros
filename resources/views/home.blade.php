@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <p class="lead">
                    Olá, {{$user->name}}
                  </p>
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
                    @permission('create-categoria')
                    <li>
                      <a href="{{route('criar_categoria')}}">Criar Categoria</a>
                    </li>
                    @endpermission
                  </ul>

                  <passport-clients></passport-clients>
                  <passport-authorized-clients></passport-authorized-clients>
                  <passport-personal-access-tokens></passport-personal-access-tokens>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
