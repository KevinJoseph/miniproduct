@extends('layouts.base')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Agregar SubCategoria
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
      <form method="post" action="{{ route('subcategories.store') }}">
           @csrf
          <div class="form-group">
             
              <label for="name">Nombre de Subcategoria:</label>
              <input type="text" class="form-control" name="name"/>

          </div>
          <div class="form-group">
             <label for="category">Elige una categoria:</label>
              <select class="form-control" name="category" id="category">
                <option selected>Seleccionar</option>
              </select>         
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
</script>
@endsection