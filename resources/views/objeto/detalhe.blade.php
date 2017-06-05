@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        {{$objeto->name}}<br />
        {{$objeto->categoria->name}}<br />
        <a href="/objetos" class="btn btn-primary">Objetos</a>
        <a href="/home" class="btn btn-primary">Home</a>

      </div>
    </div>
  </div>
@endsection
