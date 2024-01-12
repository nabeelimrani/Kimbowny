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
                        <form class="needs-validation" novalidate>
                           <div class="row">
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                 </div>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="theme-input-box">
                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                 </div>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="theme-input-box">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                                 </div>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="theme-input-box">
                                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xl-5 col-lg-5 col-md-5 col-sm-4 col-12">
                                 <div class="theme-input-box">
                                    <label for="country">Country</label>
                                    <select class="form-control custom-select" id="country" required>
                                       <option value="">Choose...</option>
                                       <option>United States</option>
                                    </select>
                                    <div class="invalid-feedback">
                                       Please select a valid country.
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                 <div class="theme-input-box">
                                    <label for="state">State</label>
                                    <select class="form-control custom-select" id="state" required>
                                       <option value="">Choose...</option>
                                       <option>California</option>
                                    </select>
                                    <div class="invalid-feedback">
                                       Please provide a valid state.
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12">
                                 <div class="theme-input-box">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                       Zip code required.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="checkout-checkbox">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="same-address">
                                 <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="save-info">
                                 <label class="custom-control-label" for="save-info">Save this information for next time</label>
                              </div>
                           </div>
                           <h3 class="theme-title theme-title-box">Payment</h3>
                           <div class="checkout-radio-box">
                              <div class="custom-control custom-radio">
                                 <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                 <label class="custom-control-label" for="credit">Credit card</label>
                              </div>
                              <div class="custom-control custom-radio">
                                 <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                 <label class="custom-control-label" for="debit">Debit card</label>
                              </div>
                              <div class="custom-control custom-radio">
                                 <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                 <label class="custom-control-label" for="paypal">PayPal</label>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <label for="cc-cvv">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                 </div>
                              </div>
                           </div>
                           <div class="checkout-btn">
                              <a href="https://theme.bitrixinfotech.com/pet-shop/demo1/tracking.html" class="theme-btn">Place Order</a>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
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
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="coupon-code-box">
                           <form class="coupon-card">
                              <div class="theme-input-box">
                                 <input type="text" class="form-control" placeholder="Promo code">
                                 <button type="submit" class="theme-btn btn-light">Redeem</button>
                              </div>
                           </form>
                        </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Checout -->

@endsection
