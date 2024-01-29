@extends("layouts.app")
@section("content")

  <style>



  </style>
  <!-- Bradcrumb -->
    <section class="bradcrumb-area page-background">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="bradcrumb-box text-center">
              <h1>Shop</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Bradcrumb -->
    <!-- Shop Page -->
    <section class="shop-page-area page-paddings">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
            <div class="shop-sidebar">
              <div class="sidebar-widget sidebar-search">
                <h3 class="widget-title">Search</h3>
                <div class="sidebar-widget-box">

                    <div class="theme-input-box">
                      <form action="{{route('search')}}" method="get">
                      <input class="form-control" type="text" name="query" placeholder="Search our store">
                      <button type="submit" class="widget-search-btn"><i class="fas fa-search"></i></button>

                      </form>
                    </div>

                </div>
              </div>
              <div class="sidebar-widget category-sub-menu">
                <h3 class="widget-title">Categories</h3>
                <div class="sidebar-widget-box">
                  <ul class="sidebar-category">
                    @foreach($categories as $category)
                    <li><a href="{{url($category->pagelink())}}">{{$category->name}}<span>({{$category->products->count()}})</span></a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="sidebar-widget product-sidebar-size">
{{--                <h3 class="widget-title">Shop By Price</h3>--}}
{{--                <div class="sidebar-widget-box">--}}
{{--                  <ul>--}}
{{--                    <li><a href="#">$100 - $200</a></li>--}}
{{--                    <li><a href="#">$200 - $300</a></li>--}}
{{--                    <li><a href="#">$300 -  $500</a></li>--}}
{{--                    <li><a href="#">$500 - $700</a></li>--}}
{{--                    <li><a href="#">$700 - $1000</a></li>--}}
{{--                  </ul>--}}
{{--                </div>--}}
              </div>

            </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
            <div class="collection-shorting clearfix">
              <div class="short-tab">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#sort-1" role="tab"><i class="fas fa-th"></i></a>
                  </li>

                </ul>
              </div>
              <div class="short-list">
                <div class="product-filter clearfix">
{{--                  <ul class="clearfix">--}}
{{--                   --}}
{{--                    <li>--}}
{{--                      <label>Sort by:</label>--}}
{{--                      <select class="product-filter-dropdown">--}}
{{--                        <option value="manual">Featured</option>--}}
{{--                        <option value="best-selling">Best Selling</option>--}}
{{--                        <option value="title-ascending">Alphabetically, A-Z</option>--}}
{{--                        <option value="title-descending">Alphabetically, Z-A</option>--}}
{{--                        <option value="price-ascending">Price, low to high</option>--}}
{{--                        <option value="price-descending">Price, high to low</option>--}}
{{--                        <option value="created-descending">Date, new to old</option>--}}
{{--                        <option value="created-ascending">Date, old to new</option>--}}
{{--                      </select>--}}
{{--                    </li>--}}
{{--                  </ul>--}}
                </div>
              </div>
            </div>
            <div class="shop-grid-box">
              <div class="tab-content">
                <div class="tab-pane active" id="sort-1" role="tabpanel">
                  <div class="shop-product-box">
                    <div class="row">
                      @forelse($products as $product)
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-box {{$product->quantity<1?'out-of-stock-box':''}} text-center">
                          <div class="product-images">
                            <a href="{{url($product->pagelink())}}">
                              <img src="{{asset($product->photo)}}" alt="">
                            </a>
                            @auth
                              <i data-id="{{$product->id}}" class="pro-whislist-ico far fa-heart addtowish"></i>
                            @else
                                <a href="{{route('login')}}"  class="pro-whislist-ico far fa-heart addtowish"></a>
                            @endauth
                          </div>
                          <div class="product-content">
                            <span>{{$product->category->name}}</span>
                            <h3 class="theme-title"><a href="{{url($product->pagelink())}}">{{$product->name}}</a></h3>
                            <div class="product-ratting">
                              <i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="product-price">
                              @if($product->discount)
                                <span class="price"><del>AED : {{$product->sale}}</del></span> <!-- Original price -->
                                @php
                                  $discountedPrice = $product->sale - ($product->sale * ($product->discount / 100));
                                @endphp
                                <span class="price"><ins>AED : {{$discountedPrice}}</ins></span> <!-- Discounted price -->
                              @else
                                <span class="price"><ins>AED : {{$product->sale}}</ins></span> <!-- No discount, display original price only -->
                              @endif
                            </div>
                            <div class="product-btn">
                              <button data-id="{{$product->id}}" class="theme-btn addToCart">Add To Cart</button>
                            </div>
                            @if($product->quantity<1)
                              <div class="product-out-stock">
                                <span>Out Of Stock</span>
                              </div>
                            @endif
                          </div>
                        </div>
                      </div>
                        @empty
                        <div class="col-md-12 my-5">

                          <h3>No Product Found</h3>

                        </div>
                      @endforelse
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="theme-pagination clearfix">
                          @if ($products instanceof Illuminate\Pagination\LengthAwarePaginator || $products instanceof Illuminate\Pagination\Paginator)
                            @if ($products->hasPages())
                              {{ $products->links() }}
                            @endif
                          @endif

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <!-- Shop Page -->

@endsection
