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
            <!-- /aside Widget -->
            <div class="aside">
              <h3 class="aside-title">Sub Categorias</h3>
              <div class="checkbox-filter">

              @foreach($subcategories as $subcategory)
                <div class="input-checkbox">
                  <input type="checkbox" id="brand-{{$subcategory->id}}">
                  <label for="brand-{{$subcategory->id}}">
                    <span></span>
                    {{$subcategory->name}}
                  </label>
                </div>
              @endforeach
   
              </div>
            </div>
            <!-- /aside Widget -->
       
          <!-- /ASIDE -->

            <!-- aside Widget -->
            <div class="aside">
              <h3 class="aside-title">Marcas</h3>
              <div class="checkbox-filter">
                @foreach($brands as $brand)
                <div class="input-checkbox">
                  <input type="checkbox" id="brand-{{$brand->id}}">
                  <label for="brand-{{$brand->id}}">
                    <span></span>
                    {{$brand->name}}
                    <small>(1)</small>
                  </label>
                </div>
                @endforeach
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
                    <p class="product-category">{{App\Category::find($product->id_category)->name}}</p>
                    <h3 class="product-name"><a href="{{url('product',$product->id)}}">{{$product->name}}</a></h3>
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
                    <a href="{{url('product',$product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Comprar</button></a>
                    
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
              <span class="store-qty"></span>
                            <nav aria-label="Page navigation example">
            <div>
            {{$products->links()}}  
            </div>

            </nav>
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