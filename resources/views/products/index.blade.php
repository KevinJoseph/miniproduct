@extends('layouts.base')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nombre</td>
          <td>Descripción</td>
          <td>Precio</td>
          <td colspan="2">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $products)
        <tr>
            <td>{{$products->id}}</td>
            <td>{{$products->name}}</td>
            <td>{{$products->description}}</td>
            <td>{{$products->price}}</td>
            <td><a href="{{ route('products.edit',$products->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('products.destroy', $products->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@endsection