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
                                    <th>QTY</th>
                                    <th>Subtotal</th>
                                    <th>Remove</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="cart-pro-box">
                                          <div class="cart-pro-img"><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/small/dog1.jpg" alt=""></div>
                                          <span>Dog Biscuits</span>
                                       </div>
                                    </td>
                                    <td>$28.00</td>
                                    <td>
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
                                          <input type="number" class="quantity-input" data-quantity-target="" value="1" step="1" name="quantity">
                                          <button class="quantity-btn" data-quantity-plus="">
                                             <svg viewBox="0 0 426.66667 426.66667">
                                                <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"></path>
                                             </svg>
                                          </button>
                                       </div>
                                    </td>
                                    <td><span class="cart-subtotal">$28.00</span></td>
                                    <td><button class="cart-tras-btn" data-toggle="modal" data-target="#remove-product"><i class="fas fa-trash-alt"></i></button></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="cart-pro-box">
                                          <div class="cart-pro-img"><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/small/dog2.jpg" alt=""></div>
                                          <span>Peanut Butter</span>
                                       </div>
                                    </td>
                                    <td>$28.00</td>
                                    <td>
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
                                          <input type="number" class="quantity-input" data-quantity-target="" value="1" step="1" name="quantity">
                                          <button class="quantity-btn" data-quantity-plus="">
                                             <svg viewBox="0 0 426.66667 426.66667">
                                                <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"></path>
                                             </svg>
                                          </button>
                                       </div>
                                    </td>
                                    <td><span class="cart-subtotal">$28.00</span></td>
                                    <td><button class="cart-tras-btn" data-toggle="modal" data-target="#remove-product"><i class="fas fa-trash-alt"></i></button></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="cart-pro-box">
                                          <div class="cart-pro-img"><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/small/dog3.jpg" alt=""></div>
                                          <span>All Breeds</span>
                                       </div>
                                    </td>
                                    <td>$28.00</td>
                                    <td>
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
                                          <input type="number" class="quantity-input" data-quantity-target="" value="1" step="1" name="quantity">
                                          <button class="quantity-btn" data-quantity-plus="">
                                             <svg viewBox="0 0 426.66667 426.66667">
                                                <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"></path>
                                             </svg>
                                          </button>
                                       </div>
                                    </td>
                                    <td><span class="cart-subtotal">$28.00</span></td>
                                    <td><button class="cart-tras-btn" data-toggle="modal" data-target="#remove-product"><i class="fas fa-trash-alt"></i></button></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="shopping-cart-footer">
                        <div class="row">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="shopping-cart-btn">
                                 <a href="#" class="theme-btn btn-light">Update Shopping Cart</a>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="shopping-cart-btn text-right">
                                 <a href="#" class="theme-btn">Clear Shopping Cart</a>
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
                                          <li>2 items <span>$84.00</span></li>
                                          <li>Shipping <span>Free</span></li>
                                       </ul>
                                       <ul>
                                          <li>Total (tax excl.) <span>$84.00</span></li>
                                          <li>Taxes <span>$0.00</span></li>
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
