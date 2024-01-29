@extends("layouts.app")
@section("content")

  <!-- Bradcrumb -->
  <section class="bradcrumb-area page-background">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="bradcrumb-box text-center">
            <h1>Checkout</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Bradcrumb -->
  <!-- Checout -->
  <section class="checout-area page-paddings">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
          <div class="checkout-title">
            <h3 class="theme-title">Billing address</h3>
          </div>
          <div class="checkout-fom-box">
            <form id="checkoutform" action="storeOrder" method="post">
              <div class="row">
                @csrf
                <div class="col-md-8">
                  <div class="theme-input-box">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{authfilter('email')}}"
                           id="checkoutemail" placeholder="you@example.com">
                    @error("email")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theme-input-box">
                    <label for="email">First Name</label>
                    <input type="text" class="form-control" name="firstname" value="{{authfilter('firstname')}}"
                           placeholder="First Name">
                    @error("firstname")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theme-input-box">
                    <label for="email">Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="{{authfilter('lastname')}}"
                           placeholder="Last Name">
                    @error("lastname")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="theme-input-box">
                    <label for="address">Address</label>
                    <textarea class="form-control" name="address" id="address" cols="20"
                              rows="3">{{authfilter('address')}}</textarea>
                    @error("address")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theme-input-box">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" name="phone" value="{{authfilter('phone')}}"
                           placeholder="Phone">
                    @error("phone")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theme-input-box">
                    <label for="area">Area</label>
                    <input type="text" class="form-control" name="area" value="{{authfilter('area')}}"
                           placeholder="Area">
                    @error("area")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theme-input-box">
                    <label for="country">Country</label>
                    <select class="form-control custom-select" name="country" id="checkoutcountry">
                      <option value="">Choose..</option>
                      @if(auth()->user() && auth()->user()->country != null)
                        <option selected>{{ auth()->user()->country }}</option>
                        <option {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates
                        </option>
                        <option {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                      @else
                        <option {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates
                        </option>
                        <option {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                      @endif
                    </select>

                    @error("country")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theme-input-box">
                    <label for="state">City</label>
                    <select class="form-control custom-select" name="city" id="checkoutcity">
                      <option value=''>Choose...</option>
                      @if(auth()->user() && auth()->user()->city != null)
                        <option selected>{{ auth()->user()->city }}</option>
                      @endif
                    </select>
                    @error("city")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                @guest
                  <div class="col-md-6">
                    <div class="theme-input-box">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="pass" placeholder="Password">
                      @error("pass")
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>

                @endguest
                <div class="col-md-6">
                  <div class="theme-input-box">
                    <label for="pcode">Promo Code</label>
                    <input type="text" class="form-control" name="pcode" placeholder="Promo Code">
                    @error("pcode")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theme-input-box">
                    <label for="order">Order Note</label>

                    <textarea class="form-control" name="ordernote" id="order" cols="20"
                              rows="3">{{old('ordernote')}}</textarea>
                    @error("ordernote")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="theme-input-box">
                    <label>Payment Methods</label><br>

                    <img src="{{asset('stripe.png')}}" width="60">
                    <input type="radio" name="payment_method" value="stripe">

                    <br>
                    <img src="{{asset('tabby.png')}}" width="60">
                    <input type="radio" name="payment_method" value="tabby">
                    @error("payment_method")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>

                <div class="checkout-btn">
                  <button type="submit" class="ml-3 theme-btn" {{session('cart')?'':'disabled'}}>Place Order</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="shopping-cart-box widget-box">
            @guest
              <div class="faq-box mb-3 ">
                <div class="faq-box-list">
                  <a href="JavaScript:Void(0)" class="">Returning Customer? Click here..</a>
                  <div class="content" id="returning">
                    <div class="user signinBx">

                      <div class="formBx">
                        <form action="{{route('login')}}" method="post">

                          @csrf
                          <div class="theme-input-box">
                            <input class="form-control" type="email" name="email" placeholder="Email Address"/>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                          <div class="theme-input-box">
                            <input class="form-control" type="password" name="password" placeholder="Password"/>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                          <div class="theme-input-box">
                            <button class="theme-btn">Login</button>
                          </div>
                          <p class="signup">
                            @if (Route::has('password.request'))
                              <a  href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                              </a>
                            @endif
                          </p>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            @endguest
            <div class="widget">
              <div class="widget-category">
                <div class="blog-news-title">
                  <h2>Subtotal</h2>
                </div>
                <div class="subtotal-content">
                  <!-- <h3 class="theme-title">Grand Total: $84.00</h3>
                  <button class="theme-btn btn-light">Proceed To Checkout</button>
                  <p class="theme-description">Checkout with Multiple Addresses</p> -->
                  <div class="subtotal-content-box">
                    <ul>

                      <li class="text-danger">
                        NOTE* Shipping fee for products in Saudi Arabia is AED : 30.00 <br>
                        <hr>
                        NOTE* Shipping fee is AED : 10.00  for products in UAE which are below AED:100.00

                      </li>
                      <hr>
                      <li>{{$total}} items <span>AED : <span id="actualprice">{{$totalPrice}}</span></span></li>
                      @if($isSaudi)
                        <li>Shipping <span id="shippingcheck">AED : 30.00</span></li>
                        @else
                      <li>Shipping <span id="shippingcheck">{{$fee==0?'Free':"AED {$fee}"}}</span></li>
                      @endif
                    </ul>
                    <ul>
                      @if($isSaudi)
                        <li>Total (tax excl.) <span>AED : <span id="totalcheck">{{$totalPrice+30}}</span></span></li>
                      @else
                      <li>Total (tax excl.) <span>AED : <span id="totalcheck">{{$totalPrice+$fee}}</span></span></li>
                      @endif
                      <li>Taxes <span>AED : 0.00</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="coupon-code-box">
            <div class="card">
              <div class="card-body">
                <div class="slide-content">
                  <ul>
                    @foreach($products as $product)
                    <li>
                      <div class="slider-images">
                        <a href="{{url($product->link)}}"><img src="{{$product->photo}}" alt=""></a>
                      </div>
                      <div class="slider-content">
                        <h3 class="theme-title">{{$product->name}}</h3>
                        <div class="product-price">
                          @if($product->discount)
                            <span class="price"><del>AED : {{$product->sale}} X {{$product->quantity}}</del></span> <!-- Original price -->
                            @php
                              $discountedPrice = $product->sale - ($product->sale * ($product->discount / 100));
                            @endphp
                            <span class="price"><ins>AED : {{$discountedPrice}} X {{$product->quantity}}</ins></span> <!-- Discounted price -->
                          @else
                            <span class="price"><ins>AED : {{$product->sale}} X {{$product->quantity}}</ins></span> <!-- No discount, display original price only -->
                          @endif
                        </div>
                      </div>



                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- Checout -->

@endsection
