@extends('layouts.base')

@section('content')

<div class="row">
  <div class="col-md-11">
    <h2>Promociones y Ofertas</h2>
  </div>
   <a href="{{url('promotions/create')}}" type="button" class="btn btn-success">Crear</a>
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
          <td style="font-weight: bold;">Categoria</td>
          <td style="font-weight: bold;" colspan="2">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($promotions as $promotion)
        <tr>
            <td>{{$promotion->id}}</td>
            <td>{{$promotion->name}}</td>
            <td>{{$promotion->description}}</td>
            <td>{{$promotion->price}}</td>
            <td>{{$promotion->category}}</td>
            <td><a href="{{ route('promotions.edit',$promotion->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('promotions.destroy', $promotion->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection