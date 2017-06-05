@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        {{$categoria->name}}<br />
        @if ($categoria->objetos)
          <ul>
          @foreach ($categoria->objetos as $objeto)
            <li>{{$objeto->name}}</li>
          @endforeach
          </ul>
        @endif
        <a href="/categorias" class="btn btn-primary">Categorias</a>
        <a href="/home" class="btn btn-primary">Home</a>

      </div>
    </div>
  </div>
@endsection
