
@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <form method="POST" action="/categorias/{{$categoria->id}}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group @if ($errors->has('name')) has-error @endif">
            <label for="name-field">Nome</label>
            <input type="text" class="form-control" name="name" id="name-field" placeholder="Categoria" value="{{$categoria->name}}">
            @if ($errors->has('name'))
              <span class="help-block">
                Insira um nome único.
              </span>
            @endif
          </div>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>

      </div>
    </div>
  </div>
@endsection
