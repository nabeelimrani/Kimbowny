<footer class="footer-main">
         <div class="footer-dog-images clearfix">
            <div class="footer-dog-box">
               <img src="{{asset('assets/images/dog1.png')}}" alt="">
            </div>
            <div class="footer-dog-box">
               <img src="{{asset('assets/images/dog2.png')}}" alt="">
            </div>
            <div class="footer-dog-box">
               <img src="{{asset('assets/images/dog3.png')}}" alt="">
            </div>
            <div class="footer-dog-box">
               <img src="{{asset('assets/images/dog4.png')}}" alt="">
            </div>
            <div class="footer-dog-box">
               <img src="{{asset('assets/images/dog5.png')}}" alt="">
            </div>
            <div class="footer-dog-box">
               <img src="{{asset('assets/images/dog6.png')}}" alt="">
            </div>
            <div class="footer-dog-box">
               <img src="{{asset('assets/images/dog7.png')}}" alt="">
            </div>
            <div class="footer-dog-box">
               <img src="{{asset('assets/images/dog8.png')}}" alt="">
            </div>
         </div>
         <div class="footer-top">
            <div class="container">
               <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="footer-box">
                        <div class="footer-title">
                           <h3 class="theme-title"><i class="fas fa-paw"></i> About Pet Shop</h3>
                        </div>
                        <div class="footer-content">
                           <p class="theme-description">We are a one-stop shop for pet owners and animal lovers. You’ll find high-quality pet supplies here. Take some time to look at our collection of pet products and accessories.</p>
                           <div class="social-media-box">
                              <ul class="social-icon clearfix">
                                 <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                 <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                 <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                     <div class="footer-box">
                        <div class="footer-title">
                           <h3 class="theme-title">Useful Links</h3>
                        </div>
                        <div class="footer-content">
                           <ul>
                             @foreach(\App\Models\Category::all() as $category)
                              <li><a href="{{$category->pagelink()}}"><i class="fas fa-paw"></i>{{$category->name}}</a></li>
                               @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="footer-box">
                        <div class="footer-title">
                           <h3 class="theme-title">My account</h3>
                        </div>
                        <div class="footer-content">
                           <ul>
                              <li><a href="{{route('userAccount')}}"><i class="fas fa-paw"></i> My account</a></li>
                             <li><a href="{{route('wishlist')}}"><i class="fas fa-paw"></i> Wishlist</a></li>
                              <li><a href="{{route('privacy')}}"><i class="fas fa-paw"></i> Privacy Policy</a></li>
                              <li><a href="{{route('contact')}}"><i class="fas fa-paw"></i> Help and Contact Us</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="footer-box">
                        <div class="footer-title">
                           <h3 class="theme-title">Newsletter</h3>
                        </div>
                        <div class="footer-content">
                           <p class="theme-description">Sign up to newsletter and receive $20 coupon for first shopping.</p>
                           <div class="footer-newsletter">
                              <input class="form-control" type="email" name="email" placeholder="Enter your email...">
                              <button class="subscribe-btn">Subscribe</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-copyright">
            <div class="container">
               <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                     <div class="copyright-box">
                        <p>Copyright © 2024 <a href="//www.rezvetech.com" target="_blank">RezveTech</a>. All rights reserved</p>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                     <div class="payment-box">
                        <div class="payment-card-ico"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
