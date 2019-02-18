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
      <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
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
          <div class="form-group">
              <label>Categoria:</label>
              <select class="form-control" name="category" id="category">
                <option selected>Seleccionar</option>
              </select>
          </div>
          <div class="form-group">
              <label>Marca:</label>
              <select class="form-control" name="brand" id="brand">
                <option selected>Seleccionar</option>
              </select>
          </div>
          <div class="form-group">
              <label for="exampleFormControlFile1">Seleccionar Imagen:</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
          </div>
          <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
  </div>
</div>


<script type="text/javascript">

   $.get("{{url('loadcategory')}}", function(data){ 
        //console.log(data.regions.valueOf()); 
        $.each(data.categories, function(i, val) {
        $("#category").append('<option value="' + val.id + '">' + val.name + '</option>');
               // console.log(val.id); 
      }); // close each()
    });
      $.get("{{url('loadbrand')}}", function(data){ 
        //console.log(data.regions.valueOf()); 
        $.each(data.brands, function(i, val) {
        $("#brand").append('<option value="' + val.id + '">' + val.name + '</option>');
               // console.log(val.id); 
      }); // close each()
    });
</script>
@endsection

