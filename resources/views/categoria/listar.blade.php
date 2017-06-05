@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <ul>
        @foreach ($categorias as $categoria)
          <li>
            <a href="/categorias/{{$categoria->id}}">{{$categoria->name}}</a><br />
            <a href="/categorias/editar/{{$categoria->id}}" class="btn btn-xs btn-primary">Editar</a><br />
            <form method="POST" action="/categorias/{{$categoria->id}}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-xs btn-danger">Apagar</button>
            </form>
          </li>
        @endforeach
        </ul>

      </div>
    </div>
  </div>
@endsection
