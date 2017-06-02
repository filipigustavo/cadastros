@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <ul>
        @foreach ($objetos as $objeto)
          <li>
            {{$objeto->name}} - {{$objeto->categoria->name}}<br />
            <a href="/objetos/editar/{{$objeto->id}}" class="btn btn-xs btn-primary">Editar</a>
            <form method="POST" action="/objetos/{{$objeto->id}}">
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
