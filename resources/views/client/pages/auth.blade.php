@extends("layouts.app")
@section("content")
    <section class="user-login-area " >
         <div class="container {{ request()->is('register/*') ||  request()->is('register') ? 'active' : '' }}" >
            <div class="user signinBx" >
               <div class="imgBx"><img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/login-bg.jpg" alt="" /></div>
               <div class="formBx">
                  <form action="{{route('login')}}" method="post">
                     <h2>Sign In</h2>
                     @csrf
                     <div class="theme-input-box">
                        <input class="form-control" type="email" value="{{old('email')}}" name="email" placeholder="Email Address" />
                     @error('email')
                       <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="theme-input-box">
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                       @error('password')
                       <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="theme-input-box">
                        <button class="theme-btn">Login</button>
                     </div>
                     <p class="signup">
                        Don't have an account ?
                        <a href="{{route('register')}}" >Sign Up.</a>
                     </p>
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
            <div class="user signupBx" style="height: 700px" >
               <div class="formBx">
                  <form action="{{route('register')}}" method="post" >
                     <h2>Create an account</h2>
                     @csrf
                    <div class="theme-input-box">
                      <input class="form-control" type="firstname" value="{{old('firstname')}}" name="firstname" placeholder="Firt Name" />
                      @error('firstname')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="theme-input-box">
                      <input class="form-control" type="lastname" name="lastname" value="{{old('lastname')}}" placeholder="Last Name" />
                      @error('lastname')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                     <div class="theme-input-box">
                        <input class="form-control" type="email" value="{{old('email')}}" name="email" placeholder="Email Address" />
                       @error('email')
                       <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="theme-input-box">
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                       @error('password')
                       <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="theme-input-box">
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" />
                       @error('password_confirmation')
                       <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                      <div class="theme-input-box">
                        <input class="form-control" type="text" readonly value="{{$slug??''}}" name="referrelCode" placeholder="Referrel Code" />
                        @if(session('invalidCode'))
                          <div class="alert alert-danger">
                            {{ session('invalidCode') }}
                          </div>
                        @endif
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
