@extends('layouts.base')

@section('content')

<div class="row">
  <div class="col-md-11">
    <h2>Productos</h2>
  </div>
   <a href="{{url('products/create')}}" type="button" class="btn btn-success">Crear</a>
</div>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td style="font-weight: bold;">ID</td>
          <td style="font-weight: bold;">Nombre</td>
          <td style="font-weight: bold;">Descripción</td>
          <td style="font-weight: bold;">Precio</td>
          <td style="font-weight: bold;" colspan="2">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  <nav aria-label="Page navigation example">
<div>
<hr>
{{$products->links()}}  
</div>

</nav>

@endsection