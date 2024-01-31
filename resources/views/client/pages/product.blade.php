  @extends("layouts.app")
  @section("content")

    <!-- Bradcrumb -->
    <section class="bradcrumb-area page-background">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="bradcrumb-box text-center">
              <h1>Shop Detail</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Bradcrumb -->
    <!-- Shop Detail -->
    <section class="shop-detail-box-area page-paddings">

      <div class="container">
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="shop-pro-main">
              <div class="shop-pro-thumbnail">
                <ul class="shop-slider">
                  @foreach($product->images as $image)
                  <li><span><img src="{{asset($image->path)}}" onclick="ChangeImage({{asset($image->path)}});" alt=""></span></li>
                  @endforeach
                </ul>
              </div>

              <div class="shop-pro-images">
                <img id="image-change" src="{{asset($product->photo)}}" alt="">
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="shop-detail-content">
              <div class="detail-info">
                <h2 class="product-title ">{{$product->name}}</h2>
                <div class="product-price ">

                    @if($product->discount)
                      <span class="enj-product-price-compare"><del>AED : {{$product->sale}}</del></span> <!-- Original price -->
                      @php
                        $discountedPrice = $product->sale - ($product->sale * ($product->discount / 100));
                      @endphp
                      <span class="enj-product-price engoj_price_main"><ins>AED : {{$discountedPrice}}</ins></span> <!-- Discounted price -->
                    @else
                    <ins class="enj-product-price engoj_price_main">AED : {{$product->sale}}</ins> <!-- No discount, display original price only -->
                    @endif

                </div>
                <div class="product-ratting">
                  @for($i = 1; $i <= 5; $i++) @if($i <=round($product->ratings->avg('rating')))
                  <i class="fas fa-star ratting-active"></i>
                @else
                  <i class="fas fa-star"></i>
                  @endif
                  @endfor
                </div>
                <form id="addToCartProductPage">
                <div class="pro-detail-desc">
                @csrf
                </div>
                @if(filled($product->colors))
                <div class="product-weight mb-3">
                  <div class="row">
                  <div class="col-md-6">
                  <select class="form-control" name="color" id="pcolor">
                    <option value="">Select Color</option>
                    @foreach($product->colors as $color)
                      <option value="{{$color->name}}">{{$color->name}}</option>
                    @endforeach
                  </select>
                    <div id="error-color" class="text-danger"></div>
                  </div>
                  </div>
                </div>
                @endif
                @if(filled($product->sizes))
                  <div class="product-weight mb-3">
                    <div class="row">
                      <div class="col-md-6">
                        <select class="form-control" name="size" id="psize">
                          <option value="">Select Size</option>
                          @foreach($product->sizes as $size)
                            <option value="{{$size->name}}">{{$size->name}}</option>
                          @endforeach
                        </select>

                        <div id="error-size" class="text-danger"></div>

                      </div>
                    </div>
                  </div>
                @endif
                <div class="shop-qty-box clearfix">
                  <div class="quantity-control" data-quantity="">
                    <button type="button" class="quantity-btn" data-quantity-minus="">
                      <svg viewBox="0 0 409.6 409.6">
                        <g>
                          <g>
                            <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z"></path>
                          </g>
                        </g>
                      </svg>
                    </button>
                    <input type="number" id="qty" class="quantity-input" data-quantity-target="" value="1" step="1" name="qty">
                    <button  type="button" class="quantity-btn" data-quantity-plus="">
                      <svg viewBox="0 0 426.66667 426.66667">
                        <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"></path>
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="shop-buy-btn">

                  <input type="hidden" value="<?=$product->id?>" name="id">
                  <button type="submit"   class="theme-btn">Buy It Now</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="pro-detail-tab">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active show" data-toggle="tab" href="#description" role="tab" aria-selected="true">Description</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#customer-ratting" role="tab" aria-selected="false">Reviews ({{$product->ratings->count()}})</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active show" id="description" role="tabpanel">
                  <div class="pro-detail-tab-content">
                    <p class="theme-description">
                      {{$product->description}}
                    </p>
                  </div>
                </div>

                <div class="tab-pane" id="customer-ratting" role="tabpanel">
                  <div class="pro-detail-tab-content">
                    @foreach($product->ratings as $rating)

                      <div class="comments">
                        <ul class="comment-list clearfix">
                          <li>
                            <div class="comment">
                              <div class="comment-author">
                                <div class="comment-author-name">{{$rating->user->fullname}}
                                  <span class="comment-meta">{{$rating->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="comment-body">
                                  <p>
                                    @for($i = 1; $i <= 5; $i++)
                                      @if($i <= round($rating->rating))
                                        <i class="fas fa-star ratting-active" style="color: #e3bc52 !important"></i>
                                      @else
                                        <i class="fas fa-star"></i>
                                      @endif
                                    @endfor
                                  </p>
                                  <p>{{$rating->comment}}</p>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    @endforeach

                  @auth
                    <form action="{{route('addrating')}}" method="post">
                    <div class="post-reply">
                      <div class="blog-news-title">
                        <h2>Add a review</h2>
                        <input type="hidden" value="<?=$product->id?>" name="product_id">
                        <div class="review-ratting-box">

                          <div class="feedback">
                            <div class="ratt">
                              <input type="radio" name="ratt" value="5" id="ratt-5">
                              <label for="ratt-5"></label>
                              <input type="radio" name="ratt" value="4" id="ratt-4">
                              <label for="ratt-4"></label>
                              <input type="radio" name="ratt" value="3" id="ratt-3">
                              <label for="ratt-3"></label>
                              <input type="radio" name="ratt" value="2" id="ratt-2">
                              <label for="ratt-2"></label>
                              <input type="radio" name="ratt" value="1" id="ratt-1">
                              <label for="ratt-1"></label>
                              <div class="emoji-wrapper">
                                <div class="emoji">
                                  <svg class="ratt-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                    <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534" />
                                    <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff" />
                                    <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347" />
                                    <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63" />
                                    <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff" />
                                    <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347" />
                                    <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63" />
                                    <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347" />
                                  </svg>
                                  <svg class="ratt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                    <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                    <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347" />
                                    <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534" />
                                    <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff" />
                                    <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347" />
                                    <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff" />
                                    <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534" />
                                    <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff" />
                                    <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347" />
                                    <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff" />
                                  </svg>
                                  <svg class="ratt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                    <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                    <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347" />
                                    <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff" />
                                    <circle cx="340" cy="260.4" r="36.2" fill="#3e4347" />
                                    <g fill="#fff">
                                      <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10" />
                                      <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z" />
                                    </g>
                                    <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347" />
                                    <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff" />
                                  </svg>
                                  <svg class="ratt-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                    <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347" />
                                    <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                    <g fill="#fff">
                                      <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z" />
                                      <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81" />
                                    </g>
                                    <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                                    <g fill="#fff">
                                      <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1" />
                                      <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81" />
                                    </g>
                                    <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                                    <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff" />
                                  </svg>
                                  <svg class="ratt-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                    <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                    <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b" />
                                    <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f" />
                                    <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff" />
                                    <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b" />
                                    <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f" />
                                    <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff" />
                                    <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347" />
                                    <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b" />
                                  </svg>
                                  <svg class="ratt-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <g fill="#ffd93b">
                                      <circle cx="256" cy="256" r="256" />
                                      <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z" />
                                    </g>
                                    <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4" />
                                    <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea" />
                                    <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88" />
                                    <g fill="#38c0dc">
                                      <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z" />
                                    </g>
                                    <g fill="#d23f77">
                                      <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z" />
                                    </g>
                                    <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347" />
                                    <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b" />
                                    <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2" />
                                  </svg>
                                </div>
                              </div>
                            </div> @error('ratt') <span class="text-danger">{{$message}}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="comment-form-body">

                          <div class="row">

                              <div class="comments-box">
                                <label for="comment">Comment</label>
                                @csrf
                                <textarea class="form-control" name="comment" id="comment" cols="50" rows="5"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="comments-box">
                                <button class="theme-btn">Post Comment</button>
                              </div>
                            </div>
                          </div>

                      </div>
                    </form>
                      @endauth
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shop Detail -->
    <!-- Related Product -->
    <section class="related-product-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title text-center">
              <h2>Related products</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="related-product-slider">
              @foreach($products as $relatedProduct)

              <div class="product-box text-center">
                <div class="product-images">

                  <a href="{{url($relatedProduct->pagelink())}}">
                    <img src="{{asset($relatedProduct->photo)}}" alt="no image">
                  </a>
                  <div class="pro-whislist-ico">
                    <i class="far fa-heart"></i>
                  </div>
                </div>
                <div class="product-content">
                  <span>{{$relatedProduct->category->name}}</span>
                  <h3 class="theme-title"><a href="{{url($relatedProduct->pagelink())}}">{{$relatedProduct->name}}</a></h3>
                  <div class="product-ratting">    @for($i = 1; $i <= 5; $i++) @if($i <=round($relatedProduct->ratings->avg('rating')))
                      <i class="fas fa-star ratting-active"></i>
                    @else
                      <i class="fas fa-star"></i>
                    @endif
                    @endfor </div>
                  <div class="product-price">
                    @if($relatedProduct->discount)
                      <span class="price"><del>AED : {{$relatedProduct->sale}}</del></span> <!-- Original price -->
                      @php
                        $discountedPrice = $relatedProduct->sale - ($relatedProduct->sale * ($relatedProduct->discount / 100));
                      @endphp
                      <span class="price"><ins>AED : {{$discountedPrice}}</ins></span> <!-- Discounted price -->
                    @else
                      <span class="price"><ins>AED : {{$relatedProduct->sale}}</ins></span> <!-- No discount, display original price only -->
                    @endif
                  </div>
                  <div class="product-btn">

                    <a href="{{url($relatedProduct->pagelink())}}"  class="theme-btn ">View Details</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

  @endsection

