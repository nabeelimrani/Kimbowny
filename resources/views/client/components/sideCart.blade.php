 <div class="theme-slide-box shopping-cart-slide">
         <div class="theme-slide-inner">
            <div class="slide-header">
               <h3 class="theme-title">Shopping Cart</h3>
               <span><span id="total"></span> Cart</span>
               <i class="slide-close fas fa-times-circle"></i>
            </div>
            <div class="slide-content">
               <ul id="sideCart">


               </ul>
            </div>
            <div class="slide-content-footer text-center">
               <h3 class="theme-title">Subtotal: $<span id="totalprice">00.00</span></h3>
               <ul>
                  <li><a href="{{url('/cart')}}" class="theme-btn">View Cart</a></li>
                  <li><a href="{{url('/checkout')}}" class="theme-btn">Checkout</a></li>
               </ul>
            </div>
         </div>
      </div>
