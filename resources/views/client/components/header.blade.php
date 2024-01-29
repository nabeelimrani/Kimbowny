 <header class="header-main">
         <div class="header-top">
            <div class="container">
               <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                     <div class="header-top-left">
                        <ul class="clearfix">
                           <li><a href="#"><i class="fas fa-phone-alt"></i>+971 52 489 4820</a></li>
                           <li><a href="#"><i class="far fa-envelope"></i>support@kimbownypetstore.com</a></li>
                        </ul>
                     </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                     <div class="header-top-right">
                        <ul class="clearfix">
                           <li><a href="{{url('login')}}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                           <li><a href="{{url('register')}}"><i class="fas fa-user-plus"></i> Register</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-12">
                     <div class="header-logo">
                        <a href="{{url('/')}}"><span class="theme-logo"></span></a>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12">
                     <div class="header-main-menu">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active">
                                    <a class="nav-link active" href="{{url('/')}}">Home</a>
                                 </li>

                                  <li class="nav-item">
                                    <a class="nav-link" href="{{route('about')}}">About</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                                 </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{route('privacy')}}">Privacy Policy</a>
                                 </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{route('faq')}}">FAQ's</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                     <div class="header-right-btn clearfix">
                        <ul class="float-right">
                          <li>
{{--                            <a class="header-search" href="javascript:void(0)"><i class="fas fa-search"></i></a>--}}
                            <ul class="search-dropdown">
                              <li>
                                <div class="header-search-box">
                                  <input class="form-control" type="text" name="search" placeholder="Search here...">
                                </div>
                              </li>
                            </ul>
                          </li>
                           <li><a class="header-cart" href="javascript:void(0)"><i class="fas fa-shopping-bag"></i> <span class="budge" id="headercarttotal">0</span></a></li>


                          @auth
                            <li><a class="header-wishlist" href="javascript:void(0)"><i class="fas fa-heart"></i> <span class="budge"><span id="wishcout2">0</span></span></a></li>
                           <li><a href="{{route('userAccount')}}"><i class="fas fa-user"></i></a></li>
                            <li><a href="{{route('log-out')}}"><i class="fas fa-door-open"></i></a></li>

                          @else
                            <li><a href="{{route('login')}}"><i class="fas fa-user"></i></a></li>
                          @endauth
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
