@extends('layouts.baseclient')
@section('content')

 <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Hola!</h1>
          <p class="lead text-muted">Por favor elige una categoria, te esperamos...</p>
          <p>
            @foreach ($categories as $category)
            <a href="{{url('show/'.$category->id)}}" class=" col-md-3 btn btn-primary my-2">{{$category->name}}</a>
            @endforeach
          </p>
        </div>

        </section>
        <div class="album py-5 bg-light">

        <div class="container">
                  <h4>Ofertas y Promociones</h4>
          <hr>
         
         <div class="row">
           @foreach($promotions as $promotion)
            <div class="col-md-4">
            <div class="card mb-4 shadow-sm" style="width: 20rem;">
              <img class="card-img-top" src="upload/{{$promotion->path_image}}" alt="Card image cap" height="230">
              <div class="card-body">
                <h5 class="card-title">Producto: {{$promotion->name}}</h5>
                <p class="card-text">Caracteristicas: {{$promotion->description}}</p>
                <hr>
                <p class="card-title">Precio: S/.{{$promotion->price}}</p>
                <a href="#" class="btn btn-primary">Comprar</a>
              </div>
            </div>
            </div>
            @endforeach       
        </div>

            <nav aria-label="Page navigation example">
            <div>
            <label for="">Siguiente:</label>
            {{$promotions->links()}}  
            </div>

            </nav>
      </div> <!-- Cerrar container -->
      </div>
@endsection