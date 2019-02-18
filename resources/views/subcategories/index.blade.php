@extends('layouts.base')

@section('content')

<div class="row">
  <div class="col-md-11">
    <h2>Sub Categorias</h2>
  </div>
   <a href="{{url('subcategories/create')}}" type="button" class="btn btn-success">Crear</a>
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
          <td style="font-weight: bold;">Categoria</td>
          <td style="font-weight: bold;">Sub-categoria</td>
          <td style="font-weight: bold;" colspan="2">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($subcategories as $subcategory)
        <tr>
            <td>{{$subcategory->id}}</td>
            <td>{{$subcategory->name}}</td>
            <td>{{$subcategory->category}}</td>
            <td><a href="{{ route('subcategories.edit',$subcategory->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('subcategories.destroy', $subcategory->id)}}" method="post">
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

</div>

</nav>

@endsection