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
                           <a href="#"><img src="{{asset($category->image)}}" alt="no image found"></a>
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
                           <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/pet2.png" alt="">
                        </div>
                        <div class="furry-friend-content">
                           <div class="furry-top-title">
                              <h3 class="theme-title">About Our In-house Staffs</h3>
                              <div class="furry-line">
                                 <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/furry-line.png" alt="">
                              </div>
                              <p class="theme-description">all well trained and certified</p>
                           </div>
                           <p class="theme-description">We have qualified well-trained in house staff who regularly check the quality of food. Once it approved, then it will be served to your pet.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-12">
                     <div class="furry-friend-box">
                        <div class="furry-friend-img">
                           <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/pet4.png" alt="">
                        </div>
                        <div class="furry-friend-content">
                           <div class="furry-top-title">
                              <h3 class="theme-title">Our Simple Process</h3>
                              <div class="furry-line">
                                 <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/furry-line.png" alt="">
                              </div>
                              <p class="theme-description">adopt, buy, get trained with these steps</p>
                           </div>
                           <p class="theme-description">Our food is made from fresh and raw ingredients. It is prepared using a gentle process called dehydration, which keeps the nutrients in place without the need for harsh cooking.</p>
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
                           <a href="{{$fproduct->pagelink()}}">
                           <img src="{{asset($fproduct->photo)}}" alt="">
                           </a>
                           <div class="pro-whislist-ico">
                              <i class="far fa-heart"></i>
                           </div>
                           <span class="prr-new-label">New</span>
                        </div>
                        <div class="product-content">
                           <span>{{$fproduct->category->name}}</span>
                           <h3 class="theme-title"><a href="#">{{$fproduct->name}}</a></h3>
                           <div class="product-ratting">
                              <i class="fas fa-star ratting-active"></i>
                               <i class="fas fa-star ratting-active"></i>
                               <i class="fas fa-star ratting-active"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                           </div>
                           <div class="product-price">
                              <span class="price"><del>${{$fproduct->sale}}}</del> </span>
                              {{--<ins>$28.00</ins>--}}
                           </div>
                           <div class="product-btn">
                              <a href="#" class="theme-btn">Add To Cart</a>
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
         <section class="pet-shop-shopping-area">
            <div class="pet-shop-shopping-main">
               <div class="pet-shop-shopping-box pet-shop-bg">
               </div>
               <div class="pet-shop-shopping-box text-center">
                  <div class="pet-shop-shopping-content">
                     <div class="pet-sale-box">
                        <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/sell-img.png" alt="">
                     </div>
                     <div class="page-title text-center">
                        <h2>Shopping Made Easy.</h2>
                        <p>Now your pet doesn’t have to wait anymore for its favorite food. This time, treat them very special by buying your pet's lovable food with the best deal available.</p>
                     </div>
                     <div class="pet-sale-btn">
                        <a href="#" class="theme-btn">Shop Now</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
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
                                @foreach($pet->products->take(8) as $product)
                                 <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ps-column-width">
                                    <div class="product-box {{$product->quantity<1?'out-of-stock-box':''}} text-center">
                                       <div class="product-images">
                                          <a href="{{$product->pagelink()}}">
                                          <img src="{{asset($product->photo)}}" alt="">
                                          </a>
                                          <div class="pro-whislist-ico">
                                             <i class="far fa-heart"></i>
                                          </div>
                                       </div>
                                       <div class="product-content">
                                          <span>BEEF</span>
                                          <h3 class="theme-title"><a href="#">{{$product->name}}</a></h3>
                                          <div class="product-ratting">
                                             <i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                          </div>
                                          <div class="product-price">
                                             <span class="price"><del>${{$product->sale}}</del> </span>
{{--                                            <ins>$28.00</ins>--}}
                                          </div>
                                          <div class="product-btn">
                                             <div id="addToCart" data-id="{{$product->id}}" class="theme-btn">Add To Cart</div>
                                          </div>
                                       </div>
                                      @if($product->quantity<1)
                                        <div class="product-out-stock">
                                          <span>Out Of Stock</span>
                                        </div>
                                        @endif

                                    </div>
                                 </div>
                                @endforeach
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="show-more-btn text-center">
                                       <a href="#" class="theme-btn btn-light">Show More</a>
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
         <section class="special-discount-area page-background">
            <div class="container">
               <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                     <div class="special-discount-image">
                        <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/limited-offer.png" alt="">
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                     <div class="special-discount-box">
                        <div class="page-title text-left">
                           <h2>Buy Now To Get The Best Price</h2>
                           <h4>$56.20</h4>
                           <p>Why do let your pets wait for their favorite food? It’s time to give your pet healthy nutritious food with a mouth-watering taste.</p>
                        </div>
                        <div class="timer product-timer">
                           <div class="days">50<span>Days</span></div>
                           <div class="hours">03<span>Hours</span></div>
                           <div class="minutes">21<span>Minutes</span></div>
                           <div class="seconds">27<span>Seconds</span></div>
                        </div>
                        <div class="product-button">
                           <a href="#" class="theme-btn">Buy Now</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Special Discount -->
         <!-- Blog -->

         <!-- Blog -->

      @endsection
<script>
      //    function makeTimer() {
      //      //      var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
      //      var endTime = new Date("31 December 2020 9:56:00 GMT+01:00");
      //      endTime = (Date.parse(endTime) / 1000);

      //      var now = new Date();
      //      now = (Date.parse(now) / 1000);

      //      var timeLeft = endTime - now;

      //      var days = Math.floor(timeLeft / 86400);
      //      var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
      //      var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
      //      var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

      //      if (hours < "10") {
      //        hours = "0" + hours;
      //      }
      //      if (minutes < "10") {
      //        minutes = "0" + minutes;
      //      }
      //      if (seconds < "10") {
      //        seconds = "0" + seconds;
      //      }

      //      $(".days").html(days + "<span>Days</span>");
      //      $(".hours").html(hours + "<span>Hours</span>");
      //      $(".minutes").html(minutes + "<span>Minutes</span>");
      //      $(".seconds").html(seconds + "<span>Seconds</span>");

      //    }
      //    setInterval(function () {
      //      makeTimer();
      //    }, 1000);
      // </script>
      <!-- Javascript -->


</html>
