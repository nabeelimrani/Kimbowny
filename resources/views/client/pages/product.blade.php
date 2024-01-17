@extends("layouts.app") @section("content")
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
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="shop-pro-main">
            <div class="shop-pro-thumbnail">
              <ul class="shop-slider">
                <li><span><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/thumbnail/small.jpg" onclick="ChangeImage('https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/pro-detail.jpg');" alt=""></span></li>
                <li><span><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/thumbnail/small-1.jpg" onclick="ChangeImage('https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/thumbnail/1.jpg');" alt=""></span></li>
                <li><span><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/thumbnail/small-2.jpg" onclick="ChangeImage('https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/thumbnail/2.jpg');" alt=""></span></li>
                <li><span><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/thumbnail/small-3.jpg" onclick="ChangeImage('https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/thumbnail/3.jpg');" alt=""></span></li>
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
                {{-- <del class="enj-product-price-compare">$20.00 USD</del>--}}
                <ins class="enj-product-price engoj_price_main">${{$product->sale}}</ins>
              </div>
              <div class="product-ratting">
                <i class="fas fa-star ratting-active"></i>
                <i class="fas fa-star ratting-active"></i>
                <i class="fas fa-star ratting-active"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="pro-detail-desc">
                <p class="theme-description">
                  {{substr($product->description,0,100)}}...
                </p>
              </div>
              <div class="product-weight">
                <ul class="clearfix">
                  <li>
                    <a href="" class="active">1KG</a>
                  </li>
                  <li>
                    <a href="">5KG</a>
                  </li>
                  <li>
                    <a href="">10KG</a>
                  </li>
                  <li>
                    <a href="">15KG</a>
                  </li>
                  <li>
                    <a href="">10KG</a>
                  </li>
                </ul>
              </div>
              <div class="shop-qty-box clearfix">
                <div class="quantity-control" data-quantity="">
                  <button class="quantity-btn" data-quantity-minus="">
                    <svg viewBox="0 0 409.6 409.6">
                      <g>
                        <g>
                          <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z"></path>
                        </g>
                      </g>
                    </svg>
                  </button>
                  <input type="number" id="qty" class="quantity-input" data-quantity-target="" value="1" step="1" name="quantity">
                  <button class="quantity-btn" data-quantity-plus="">
                    <svg viewBox="0 0 426.66667 426.66667">
                      <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"></path>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="shop-buy-btn">
                <button id="addcart" class="theme-btn">Buy It Now</button>
              </div>
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
                <a class="nav-link " data-toggle="tab" href="#details" role="tab" aria-selected="false">Details</a>
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
              <div class="tab-pane " id="details" role="tabpanel">
                <div class="pro-detail-tab-content">
                  <p class="theme-description"> 1 {{$product->description}}
                  </p>
                </div>
              </div>
              <div class="tab-pane" id="customer-ratting" role="tabpanel">
                <div class="pro-detail-tab-content">
                  <div class="comments">
                    <ul class="comment-list clearfix">
                      <li>
                        <div class="comment">
                          <div class="comment-author">
                            <img src="assets/images/avatar.png" alt="Author">
                            <a href="#" rel="external nofollow" class="comment-author-name">James</a>
                            <span class="comment-meta">March 17, 2015 at 18:45 AM</span>
                          </div>
                          <div class="comment-body">
                            <p>This is a high-quality Pedigree house commodity. Sticks are very dense and furries would love to chew on them. Personally I feel there's no need to place these sticks on daily sticks, use them every 3-5 days as kiddos won't get much harder if they're playing continuously with chewing toys particularly the rope as tartar won't stay due to frequent friction.</p>
                            <a href="#" class="comment-reply">
                              <i class="fa fa-reply"></i> Reply </a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="post-reply">
                    <div class="blog-news-title">
                      <h2>Add a review</h2>
                      <p class="theme-description">Your email address will not be published. Required fields are marked *Your rating</p>
                      <div class="review-ratting-box">
                        <div class="product-ratting">
                          <i class="fas fa-star ratting-active"></i>
                          <i class="fas fa-star ratting-active"></i>
                          <i class="fas fa-star ratting-active"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </div>
                      </div>
                    </div>
                    <div class="comment-form-body">
                      <form class="comment-form" action="index.html">
                        <div class="row">
                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="comments-box">
                              <label for="author">Your name</label>
                              <input id="author" type="text" placeholder="Your name" name="author">
                            </div>
                          </div>
                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="comments-box">
                              <label for="email">Email</label>
                              <input id="email" type="text" placeholder="Email" name="author">
                            </div>
                          </div>
                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="comments-box">
                              <label for="email">Subject</label>
                              <input id="subject" type="text" placeholder="Subject" name="subject">
                            </div>
                          </div>
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="comments-box">
                              <label for="comment">Comment</label>
                              <textarea name="comment" id="comment" cols="35" rows="5"></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="comments-box">
                              <button class="theme-btn">Post Comment</button>
                            </div>
                          </div>
                        </div>
                      </form>
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
  <!-- Shop Detail -->
  <!-- Related Product -->
  <section class="related-product-area">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-title text-center">
            <h2>Related products</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="related-product-slider">
            <div class="product-box text-center">
              <div class="product-images">
                <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">
                  <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/product1.jpg" alt="">
                </a>
                <div class="pro-whislist-ico">
                  <i class="far fa-heart"></i>
                </div>
                <span class="prr-new-label">New</span>
              </div>
              <div class="product-content">
                <span>BEEF</span>
                <h3 class="theme-title"><a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">Air Dried Beef</a></h3>
                <div class="product-ratting">
                  <i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="product-price">
                  <span class="price"><del>$30.00</del> <ins>$28.00</ins></span>
                </div>
                <div class="product-btn">
                  <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html" class="theme-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="product-box text-center">
              <div class="product-images">
                <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">
                  <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/product2.jpg" alt="">
                </a>
                <div class="pro-whislist-ico">
                  <i class="far fa-heart"></i>
                </div>
                <span class="prr-new-label">New</span>
              </div>
              <div class="product-content">
                <span>FOOD</span>
                <h3 class="theme-title"><a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">Air Dried Lamb</a></h3>
                <div class="product-ratting">
                  <i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="product-price">
                  <span class="price"><del>$30.00</del> <ins>$28.00</ins></span>
                </div>
                <div class="product-btn">
                  <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html" class="theme-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="product-box text-center">
              <div class="product-images">
                <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">
                  <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/product3.jpg" alt="">
                </a>
                <div class="pro-whislist-ico">
                  <i class="far fa-heart"></i>
                </div>
                <span class="prr-new-label">New</span>
              </div>
              <div class="product-content">
                <span>FISH</span>
                <h3 class="theme-title"><a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">Air Dried Salmon</a></h3>
                <div class="product-ratting">
                  <i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="product-price">
                  <span class="price"><del>$30.00</del> <ins>$28.00</ins></span>
                </div>
                <div class="product-btn">
                  <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html" class="theme-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="product-box text-center">
              <div class="product-images">
                <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">
                  <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/product4.jpg" alt="">
                </a>
                <div class="pro-whislist-ico">
                  <i class="far fa-heart"></i>
                </div>
                <span class="prr-new-label">New</span>
              </div>
              <div class="product-content">
                <span>REWARDS</span>
                <h3 class="theme-title"><a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">Beef Dog Rewards</a></h3>
                <div class="product-ratting">
                  <i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="product-price">
                  <span class="price"><del>$30.00</del> <ins>$28.00</ins></span>
                </div>
                <div class="product-btn">
                  <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html" class="theme-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="product-box text-center">
              <div class="product-images">
                <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">
                  <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/category/dog/dog2.jpg" alt="">
                </a>
                <div class="pro-whislist-ico">
                  <i class="far fa-heart"></i>
                </div>
              </div>
              <div class="product-content">
                <span>BEEF</span>
                <h3 class="theme-title"><a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">Peanut Butter</a></h3>
                <div class="product-ratting">
                  <i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="product-price">
                  <span class="price"><del>$30.00</del> <ins>$28.00</ins></span>
                </div>
                <div class="product-btn">
                  <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html" class="theme-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="product-box text-center">
              <div class="product-images">
                <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">
                  <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/category/dog/dog3.jpg" alt="">
                </a>
                <div class="pro-whislist-ico">
                  <i class="far fa-heart"></i>
                </div>
              </div>
              <div class="product-content">
                <span>BEEF</span>
                <h3 class="theme-title"><a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html">All Breeds</a></h3>
                <div class="product-ratting">
                  <i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="product-price">
                  <span class="price"><del>$30.00</del> <ins>$28.00</ins></span>
                </div>
                <div class="product-btn">
                  <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/shop-detail.html" class="theme-btn">Add To Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Related Product --> @endsection

