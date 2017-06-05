@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        {{$categoria->name}}<br />
        <a href="/categorias" class="btn btn-primary">Categorias</a>
        <a href="/home" class="btn btn-primary">Home</a>

      </div>
    </div>
  </div>
@endsection
