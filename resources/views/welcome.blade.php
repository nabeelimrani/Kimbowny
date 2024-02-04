@extends("layouts.app")
@section("content")
      <!-- Slider -->

    @include("client.components.slider")
         <!-- Our Service -->
         <section class="our-service-area">
            <div class="container">
               <div class="row">
                    @foreach($categories as $category)
                  <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-12">
                     <div class="category-week-box text-center">
                        <div class="category-week-img">
                           <a href="{{url($category->pagelink())}}"><img src="{{asset('storage/category_images/'.$category->image)}}" alt="no image found"></a>
                        </div>
                        <h3 class="theme-title"><a href="#">{{$category->name}}</a></h3>
                     </div>
                  </div>
                   @endforeach
               </div>
            </div>
         </section>
         <!-- Our Service -->
         <!-- Furry Friend -->
         <section class="furry-friend-area page-paddings">
            <div class="container">
               <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-12">
                     <div class="furry-friend-box">
                        <div class="furry-friend-img">
                           <img src="{{asset('assets/dog.png')}}" alt="">
                        </div>
                        <div class="furry-friend-content">
                           <div class="furry-top-title">
                              <h3 class="theme-title">Top Reasons to Select Our Pet Shop's Products and Supplies</h3>
                              <div class="furry-line">
                                 <img src="{{asset('furry-line.png')}}" alt="">
                              </div>

                           </div>
                           <p class="theme-description">Our pet shop provides quality products and supplies to meet pets' needs.
                             We carefully select each product to ensure safety, durability, and effectiveness
                             .We offer premium pet food, accessories, and grooming supplies to keep pets healthy and happy.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-12">
                     <div class="furry-friend-box">
                        <div class="furry-friend-img">
                           <img src="{{asset('assets/cat.jpeg')}}" alt="">
                        </div>
                        <div class="furry-friend-content">
                           <div class="furry-top-title">
                              <h3 class="theme-title">Efficient Order Delivery Process</h3>
                              <div class="furry-line">
                                 <img src="{{asset('furry-line.png')}}" alt="">
                              </div>

                           </div>
                           <p class="theme-description">The company prides itself on its efficient order delivery process,
                             which involves a rigorous process to ensure quick and accurate processing of orders.

                             The efficient order delivery process is an important part of the company's commitment to customer satisfaction.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Furry Friend -->
         <!-- Pet Product -->
         <section class="pet-product-area">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="page-title text-center">
                        <h2>Featured Products</h2>
                        <p>Here are listed different kinds of healthy & nutritious popular pet foods for you to choose for your beloved pet.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                   @foreach($fproducts as $fproduct)
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ps-column-width">
                     <div class="product-box {{$fproduct->quantity<1?'out-of-stock-box':''}} text-center">
                        <div class="product-images">
                           <a href="{{url($fproduct->pagelink())}}">
                           <img src="{{asset($fproduct->photo)}}" alt="">
                           </a>
                          @auth
                            <i data-id="{{$fproduct->id}}" class="pro-whislist-ico far fa-heart addtowish"></i>
                          @else
                            <a href="{{route('login')}}"  class="pro-whislist-ico far fa-heart addtowish"></a>
                          @endauth
{{--                           <span class="prr-new-label">New</span>--}}
                        </div>
                        <div class="product-content">
                           <span>{{$fproduct->category->name}}</span>
                           <h3 class="theme-title"><a href="{{url($fproduct->pagelink())}}">{{$fproduct->name}}</a></h3>
                           <div class="product-ratting">
                             @for($i = 1; $i <= 5; $i++) @if($i <=round($fproduct->ratings->avg('rating')))
                               <i class="fas fa-star ratting-active"></i>
                             @else
                               <i class="fas fa-star"></i>
                             @endif
                             @endfor
                           </div>
                          <div class="product-price">
                            @if($fproduct->discount)
                              <span class="price"><del>AED : {{$fproduct->sale}}</del></span> <!-- Original price -->
                              @php
                                $discountedPrice = $fproduct->sale - ($fproduct->sale * ($fproduct->discount / 100));
                              @endphp
                              <span class="price"><ins>AED : {{$discountedPrice}}</ins></span> <!-- Discounted price -->
                            @else
                              <span class="price"><ins>AED : {{$fproduct->sale}}</ins></span> <!-- No discount, display original price only -->
                            @endif
                          </div>

                          <div class="product-btn">
                            <a href="{{$fproduct->pagelink()}}" class="theme-btn">View Details</a>
                          </div>
                        </div>
                       @if($fproduct->quantity<1)
                         <div class="product-out-stock">
                           <span>Out Of Stock</span>
                         </div>
                       @endif
                     </div>
                  </div>
                   @endforeach
               </div>
            </div>
         </section>
         <!-- Pet Product -->
         <!-- Pet Shop Shopping -->
{{--         <section class="pet-shop-shopping-area">--}}
{{--            <div class="pet-shop-shopping-main">--}}
{{--               <div class="pet-shop-shopping-box pet-shop-bg">--}}
{{--               </div>--}}
{{--               <div class="pet-shop-shopping-box text-center">--}}
{{--                  <div class="pet-shop-shopping-content">--}}
{{--                     <div class="pet-sale-box">--}}
{{--                        <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/sell-img.png" alt="">--}}
{{--                     </div>--}}
{{--                     <div class="page-title text-center">--}}
{{--                        <h2>Shopping Made Easy.</h2>--}}
{{--                        <p>Now your pet doesn’t have to wait anymore for its favorite food. This time, treat them very special by buying your pet's lovable food with the best deal available.</p>--}}
{{--                     </div>--}}
{{--                     <div class="pet-sale-btn">--}}
{{--                        <a href="#" class="theme-btn">Shop Now</a>--}}
{{--                     </div>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--            </div>--}}
{{--         </section>--}}
         <!-- Pet Shop Shopping -->
         <!-- Featured Product -->
         <section class="featured-product-area page-paddings">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="page-title text-center">
                        <h2>Featured Pets Products</h2>
                        <p>Below are the products that have something special and unique than regular ones. This is specifically made for your pet’s health & happiness.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <ul class="nav nav-tabs pet-tab-box" role="tablist">
                       @foreach($pets as $pet)
                        <li class="nav-item">
                           <a class="nav-link {{$pet->id==1?'active':''}}" data-toggle="tab" href="{{'#tabs-'.$pet->id}}" role="tab">
                           <img src="{{$pet->image}}" alt=""> {{$pet->name}}
                           </a>
                        </li>
                       @endforeach
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                       @foreach($pets as $pet)
                        <div class="tab-pane {{$pet->id==1?'active':''}}" id="{{'tabs-'.$pet->id}}" role="tabpanel">
                           <div class="featured-product-box">
                              <div class="row">
                                @foreach($pet->products()->with("ratings","category")->take(8)->get() as $product)


                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ps-column-width">
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
                                          @for($i = 1; $i <= 5; $i++) @if($i <=round($product->ratings->avg('rating')))
                                            <i class="fas fa-star ratting-active"></i>
                                          @else
                                            <i class="fas fa-star"></i>
                                          @endif
                                          @endfor</div>
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
                                          <a href="{{$product->pagelink()}}" class="theme-btn">View Details</a>
                                        </div>
                                        @if($product->quantity<1)
                                          <div class="product-out-stock">
                                            <span>Out Of Stock</span>
                                          </div>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                @endforeach


                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="show-more-btn text-center">
                                       <a href="{{url($pet->pagelink())}}" class="theme-btn btn-light">Show More</a>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                       @endforeach

                     </div>

                  </div>
               </div>
            </div>
         </section>
         <!-- Featured Product -->
         <!-- Special Discount -->
{{--         <section class="special-discount-area page-background">--}}
{{--            <div class="container">--}}
{{--               <div class="row">--}}
{{--                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">--}}
{{--                     <div class="special-discount-image">--}}
{{--                        <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/limited-offer.png" alt="">--}}
{{--                     </div>--}}
{{--                  </div>--}}
{{--                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">--}}
{{--                     <div class="special-discount-box">--}}
{{--                        <div class="page-title text-left">--}}
{{--                           <h2>Buy Now To Get The Best Price</h2>--}}
{{--                           <h4>$56.20</h4>--}}
{{--                           <p>Why do let your pets wait for their favorite food? It’s time to give your pet healthy nutritious food with a mouth-watering taste.</p>--}}
{{--                        </div>--}}
{{--                        <div class="timer product-timer">--}}
{{--                           <div class="days">50<span>Days</span></div>--}}
{{--                           <div class="hours">03<span>Hours</span></div>--}}
{{--                           <div class="minutes">21<span>Minutes</span></div>--}}
{{--                           <div class="seconds">27<span>Seconds</span></div>--}}
{{--                        </div>--}}
{{--                        <div class="product-button">--}}
{{--                           <a href="#" class="theme-btn">Buy Now</a>--}}
{{--                        </div>--}}
{{--                     </div>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--            </div>--}}
{{--         </section>--}}


      @endsection


