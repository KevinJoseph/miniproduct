@extends('layouts.base')

@section('content')

<div class="row">
  <div class="col-md-11">
    <h2>Marcas</h2>
  </div>
   <a href="{{url('brands/create')}}" type="button" class="btn btn-success">Crear</a>
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
          <td style="font-weight: bold;" colspan="2">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
        <tr>
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
            <td><a href="{{ route('brands.edit',$brand->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('brands.destroy', $brand->id)}}" method="post">
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
{{$brands->links()}}  
</div>

</nav>

@endsection