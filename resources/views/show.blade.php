@extends('layouts.baseclient')
@section('content')
  <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- ASIDE -->
          <div id="aside" class="col-md-3">
            <!-- aside Widget -->
            <div class="aside">
              <h3 class="aside-title">Categorias</h3>
              <div class="checkbox-filter">
                @foreach($categories as $category)
                <div class="input-checkbox"
                  <input type="checkbox" id="category-{{$category->id}}">
                  <label for="category-1">
                    <span></span>
                    {{$category->name}}
                    <small>(10)</small>
                  </label>
                </div>
                @endforeach
              </div>
            </div>
            <!-- /aside Widget -->

            <!-- aside Widget -->
            <div class="aside">
              <h3 class="aside-title">Precios</h3>
              <div class="price-filter">
                <div id="price-slider"></div>
                <div class="input-number price-min">
                  <input id="price-min" type="number">
                  <span class="qty-up">+</span>
                  <span class="qty-down">-</span>
                </div>
                <span>-</span>
                <div class="input-number price-max">
                  <input id="price-max" type="number">
                  <span class="qty-up">+</span>
                  <span class="qty-down">-</span>
                </div>
              </div>
            </div>
            <!-- /aside Widget -->

            <!-- aside Widget -->
            <div class="aside">
              <h3 class="aside-title">Marcas</h3>
              <div class="checkbox-filter">
                <div class="input-checkbox">
                  <input type="checkbox" id="brand-1">
                  <label for="brand-1">
                    <span></span>
                    SAMSUNG
                    <small>(578)</small>
                  </label>
                </div>
                <div class="input-checkbox">
                  <input type="checkbox" id="brand-2">
                  <label for="brand-2">
                    <span></span>
                    LG
                    <small>(125)</small>
                  </label>
                </div>
                <div class="input-checkbox">
                  <input type="checkbox" id="brand-3">
                  <label for="brand-3">
                    <span></span>
                    SONY
                    <small>(755)</small>
                  </label>
                </div>
                <div class="input-checkbox">
                  <input type="checkbox" id="brand-4">
                  <label for="brand-4">
                    <span></span>
                    SAMSUNG
                    <small>(578)</small>
                  </label>
                </div>
                <div class="input-checkbox">
                  <input type="checkbox" id="brand-5">
                  <label for="brand-5">
                    <span></span>
                    LG
                    <small>(125)</small>
                  </label>
                </div>
                <div class="input-checkbox">
                  <input type="checkbox" id="brand-6">
                  <label for="brand-6">
                    <span></span>
                    SONY
                    <small>(755)</small>
                  </label>
                </div>
              </div>
            </div>
            <!-- /aside Widget -->
          </div>
          <!-- /ASIDE -->

          <!-- STORE -->
          <div id="store" class="col-md-9">

            <!-- store products -->
            <div class="row">
            @foreach($products as $product)
              <!-- product -->
              <div class="col-md-4 col-xs-6">
                <div class="product">
                  <div class="product-img">
                    <img src="{{url('upload/'.$product->path_image)}}" alt="">
                    <div class="product-label">
                      <span class="sale">Stock:</span>
                      <span class="new">10</span>
                    </div>
                  </div>
                  <div class="product-body">
                    <p class="product-category">Categoria</p>
                    <h3 class="product-name"><a href="{{route('products.show',$product->id)}}">{{$product->name}}</a></h3>
                    <h4 class="product-price">S/. {{$product->price}}</h4>
                    <div class="product-rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="product-btns">
                      <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                      <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                      <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                    </div>
                  </div>
                  <div class="add-to-cart">
                    <a href="{{route('products.show',$product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Comprar</button></a>
                    
                  </div>
                </div>
              </div>
              <!-- /product -->
              @endforeach
              <div class="clearfix visible-sm visible-xs"></div>
            </div>
            <!-- /store products -->

            <!-- store bottom filter -->
            <div class="store-filter clearfix">
              <span class="store-qty">Todos nuestros productos</span>
                            <nav aria-label="Page navigation example">
            <div>
            {{$products->links()}}  
            </div>

            </nav>
              <ul class="store-pagination">
                <li class="active">1</li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
            <!-- /store bottom filter -->
          </div>
          <!-- /STORE -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection