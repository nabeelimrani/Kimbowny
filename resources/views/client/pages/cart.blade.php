@extends("layouts.app")
@section("content")


         <!-- Bradcrumb -->
         <section class="bradcrumb-area page-background">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="bradcrumb-box text-center">
                        <h1>Shopping Cart</h1>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Bradcrumb -->
         <!-- Cart Section -->
         <section class="shopping-cart-area page-paddings">
            <div class="container">
               <div class="row">
                  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                     <div class="shopping-cart-box">
                        <div class="shopping-cart-table">
                           <table>
                              <thead>
                                 <tr>
                                    <th>Product</th>
                                    <th>Until Price</th>

                                    <th>color</th>
                                    <th>size</th>
                                   <th>QTY</th>
                                    <th>Subtotal</th>
                                    <th>Remove</th>
                                 </tr>
                              </thead>
                              <tbody>
                              @foreach($products as $product)
                                 <tr id="{{'row'.$product->index}}">
                                    <td>
                                       <div class="cart-pro-box">
                                          <div class="cart-pro-img"><img src="{{$product->photo}}" alt=""></div>
                                          <span>{{$product->name}}</span>
                                       </div>
                                    </td>
                                    <td>AED : <span id="unit">{{$product->sale}}</span></td>
                                   <td>{{$product->color}}</td>
                                   <td>{{$product->size}}</td>
                                    <td>
                                      <div class="quantity-control" data-quantity="">
                                        <button data-index="{{$product->index}}" data-id="{{$product->id}}" class="quantity-btn chngeqtynegative" data-quantity-minus="">
                                          <svg viewBox="0 0 409.6 409.6">
                                            <g>
                                              <g>
                                                <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z"></path>
                                              </g>
                                            </g>
                                          </svg>
                                        </button>
                                        <input type="number" min="1" class="quantity-input" data-quantity-target="" value="{{$product->quantity}}" step="1" name="quantity">
                                        <button data-index="{{$product->index}}" data-id="{{$product->id}}" class="quantity-btn chngeqtypostive" data-quantity-plus="">
                                          <svg viewBox="0 0 426.66667 426.66667">
                                            <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"></path>
                                          </svg>
                                        </button>
                                      </div>
                                    </td>
                                    <td><span style="color: #f7941d">AED : </span><span class="cart-subtotal">{{$product->sale*$product->quantity}}</span></td>
                                    <td><button data-id="{{$product->index}}" class="cart-tras-btn deleteProduct" ><i class="fas fa-trash-alt"></i></button></td>
                                 </tr>
                              @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="shopping-cart-footer">
                        <div class="row">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="shopping-cart-btn">
                                 <a href="{{url("/")}}" class="theme-btn btn-light">Continue Shopping</a>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="shopping-cart-btn text-right">
                                 <button id="clearCart" class="theme-btn">Clear Shopping Cart</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="sidebar">
                        <div class="shopping-cart-box widget-box">
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
                                         <li>{{count($products)}} items <span>AED : <span id="subtotal">{{$total}}</span></span></li>
                                         <li> Shipping <span>Will be Calculated on checkout</li>
                                         <hr>
                                         <li class="text-danger">
                                             NOTE* Shipping fee for products in Saudi is AED : 30.00 <br>
                                           <hr>
                                              NOTE* Shipping fee is AED : 10.00  for products in UAE which are below AED:100.00

                                            </li>
                                       </ul>

                                    </div>
                                    <div class="subtotal-btn text-center">
                                       <a href="{{route('checkout')}}" class="theme-btn btn-light">Proceed To Checkout</a>
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
         <!-- Cart Section -->

@endsection
