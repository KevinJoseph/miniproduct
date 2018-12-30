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
      <form method="post" action="{{ route('promotions.update', $promotion->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nombre de producto:</label>
          <input type="text" class="form-control" name="name" value='{{$promotion->name}}'/>
        </div>
        <div class="form-group">
          <label for="price">Descripción:</label>
          <input type="text" class="form-control" name="description" value='{{ $promotion->description}}'/>
        </div>
        <div class="form-group">
          <label for="quantity">Precio:</label>
          <input type="text" class="form-control" name="price" value='{{ $promotion->price}}'/>
        </div>
          <div class="form-group">
            <select id="category" name="category">
              <option selected value="{{$category->id}}">{{$category->name}}</option>
            </select>
         </div>
        <div class="form-group">
              <label for="exampleFormControlFile1">Seleccionar Imagen:</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" value="{{$promotion->image}}" name="image">
          </div>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </form>
  </div>
</div>
<script type="text/javascript">

   $.get("{{url('loadcategory')}}", function(data){ 
        console.log(data.categories.valueOf()); 
        $.each(data.categories, function(i, val) {
        $("#category").append('<option value="' + val.id + '">' + val.name + '</option>');
               // console.log(val.id); 
      }); // close each()
    });
</script>
@endsection