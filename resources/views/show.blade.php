@extends('layouts.baseclient')
@section('content')
<br>
<div class="container">
	
<div class="row">
  <div class="col-3">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Categorias:</a>
      @foreach ($categories as $category)
      <a class="list-group-item list-group-item-action" href="{{url('show/'.$category->id)}}">{{$category->name}}</a>
      @endforeach
    </div>
  </div>
  <div class="col-9">
         <div class="row">
         	@foreach($products as $product)
            <div class="col-md-4">
            <div class="card mb-4 shadow-sm" style="width: 15rem;">
              <img class="card-img-top" src="{{url('upload/'.$product->path_image)}}" alt="Card image cap" height="110" >
            
              <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}} </p>
                <hr>
                <p class="card-title">S/. {{$product->price}}</p>
                <a href="#" class="btn btn-primary">Comprar</a>
              </div>
            </div>
            </div>
            @endforeach
  
        </div>

    </div>

  </div>
              <nav aria-label="Page navigation example">
            <div>
            {{$products->links()}}  
            </div>

            </nav>
</div>

@endsection