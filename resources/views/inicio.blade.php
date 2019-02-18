@extends('layouts.baseclient')
@section('content')



    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">

          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="title">Ofertas y Promociones</h3>
              <div class="section-nav">
                <ul class="section-tab-nav tab-nav">
                  <li class="active"><a data-toggle="tab" href="#tab2">Solo por 3 días</a></li>
                </ul>
              </div>
            </div>
          </div>


          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                  <div class="products-slick" data-nav="#slick-nav-2">
   
                    @foreach($promotions as $promotion)
                    <!-- product -->
                    <div class="product">
                      <div class="product-img">
                        <img src="upload/{{$promotion->path_image}}" alt="" width="345" height="300">
                        <div class="product-label">
                          <span class="sale">Stock:</span>
                          <span class="new">3</span>
                        </div>
                      </div>
                      <div class="product-body">
                        <p class="product-category">{{App\Category::find($promotion->id_category)->name}}</p>
                        <h3 class="product-name"><a href="{{route('promotions.show',$promotion->id)}}">{{$promotion->name}}</a></h3>
                        <p class="product-category"><p class="product-category">{{$promotion->description}}</p>
                        <h4 class="product-price">S/.{{$promotion->price}} <!--del class="product-old-price">$990.00</del--></h4>
                        <div class="product-rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                      </div>
                      <div class="add-to-cart">
                        <a href="{{route('promotions.show',$promotion->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Comprar</button>s</a>
                        
                      </div>
                    </div>
                    <!-- /product -->
                    @endforeach


                  </div>
                  <div id="slick-nav-2" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->


        <!-- BANNER PROMOCIONES-->
    <div id="hot-deal" class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <div class="hot-deal">
              <ul class="hot-deal-countdown">
                <li>
                  <div>
                    <h3>02</h3>
                    <span>Days</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3>10</h3>
                    <span>Hours</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3>34</h3>
                    <span>Mins</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3>60</h3>
                    <span>Secs</span>
                  </div>
                </li>
              </ul>
              <h2 class="text-uppercase">Promociones y Ofertas</h2>
              <p>Nombre de empresa</p>
              <a class="primary-btn cta-btn" href="#">Compra ahora!</a>
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /BANNER PROMOCIONES-->   
@endsection