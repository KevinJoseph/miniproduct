@extends('layouts.base')

@section('content')

<div class="row">
  <div class="col-md-11">
    <h2>Categorias</h2>
  </div>
   <a href="{{url('categories/create')}}" type="button" class="btn btn-success">Crear</a>
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
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td><a href="{{ route('categories.edit',$category->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('categories.destroy', $category->id)}}" method="post">
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
{{$categories->links()}}  
</div>

</nav>

@endsection