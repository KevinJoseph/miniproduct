@extends('layouts.baseclient')
@section('content')
<div class="row">
           @foreach($products as $product)
            <div class="col-md-4">
            <div class="card mb-4 shadow-sm" style="width: 20rem;">
              <img class="card-img-top" src="https://via.placeholder.com/400x320" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <hr>
                <p class="card-title">{{$product->price}}</p>
                <a href="#" class="btn btn-primary">Comprar</a>
              </div>
            </div>
            </div>
            @endforeach       
</div>

<nav aria-label="Page navigation example">
<div>
<label for="">Paginas:</label>
{{$products->links()}}  
</div>

</nav>


@endsection