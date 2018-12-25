@extends('layouts.base')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Agregar Producto
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">Descripcion:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="quantity">Precio:</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
  </div>
</div>
@endsection