@extends("layouts.app")
@section("content")
    <section class="user-login-area">
         <div class="container {{ request()->is('register/*') ||  request()->is('register') ? 'active' : '' }}">
            <div class="user signinBx">
               <div class="imgBx"><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/login-bg.jpg" alt="" /></div>
               <div class="formBx">
                  <form action="{{route('login')}}" method="post">
                     <h2>Sign In</h2>
                     @csrf
                     <div class="theme-input-box">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" />
                     </div>
                     <div class="theme-input-box">
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                     </div>
                     <div class="theme-input-box">
                        <button class="theme-btn">Login</button>
                     </div>
                     <p class="signup">
                        Don't have an account ?
                        <a href="{{route('register')}}" >Sign Up.</a>
                     </p>
                  </form>
               </div>
            </div>
            <div class="user signupBx">
               <div class="formBx">
                  <form action="{{route('register')}}" method="post" >
                     <h2>Create an account</h2>
                     @csrf
                     <div class="theme-input-box">
                        <input class="form-control" type="text" name="user-name" placeholder="User Name" />
                     </div>
                     <div class="theme-input-box">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" />
                     </div>
                     <div class="theme-input-box">
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                     </div>
                     <div class="theme-input-box">
                        <input class="form-control" type="password" name="confirm-password" placeholder="Confirm Password" />
                     </div>
                      <div class="theme-input-box">
                        <input class="form-control" type="text" readonly value="{{$slug??''}}" name="referrelCode" placeholder="Referrel Code" />
                     </div>
                     <div class="theme-input-box">
                        <button class="theme-btn">Sign Up</button>
                     </div>
                     <p class="signup">
                        Already have an account ?
                        <a href="{{route('login')}}" >Sign in.</a>
                     </p>
                  </form>
               </div>
               <div class="imgBx"><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/signup-bg.jpg" alt="" /></div>
            </div>
         </div>
      </section>
@endsection
