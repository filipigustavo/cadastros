@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <form method="POST" action="/objetos">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name-field">Nome</label>
            <input type="text" class="form-control" name="name" id="name-field" placeholder="Objeto">
          </div>

          <div class="form-group">
            <label for="categoria-select">Categoria</label>
            <select class="form-control" name="categoria_id" id="categoria-select">
              @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->name}}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>

      </div>
    </div>
  </div>
@endsection
