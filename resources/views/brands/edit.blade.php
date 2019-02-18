@extends('layouts.base')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Marca
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
      <form method="post" action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nombre de la Marca:</label>
          <input type="text" class="form-control" name="name" value='{{$brand->name}}'/>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </form>
  </div>
</div>
@endsection