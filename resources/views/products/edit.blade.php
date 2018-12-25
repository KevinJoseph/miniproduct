@extends('layouts.base')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Productos
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
      <form method="post" action="{{ route('products.update', $product->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nombre de producto:</label>
          <input type="text" class="form-control" name="name" value='{{$product->name}}'/>
        </div>
        <div class="form-group">
          <label for="price">Descripción:</label>
          <input type="text" class="form-control" name="description" value='{{ $product->description}}'/>
        </div>
        <div class="form-group">
          <label for="quantity">Precio:</label>
          <input type="text" class="form-control" name="price" value='{{ $product->price}}'/>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </form>
  </div>
</div>
@endsection