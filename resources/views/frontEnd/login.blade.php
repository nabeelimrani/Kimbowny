@extends('frontEnd.Layouts.main') 
@section('main-section')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <h1>Login/Register</h1>
        <nav class="d-flex align-items-center">
          <a href="{{ route('home') }}">Home <span class="lnr lnr-arrow-right"></span>
          </a>
          <a href="{{ route('login') }}">Login</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="login_box_img">
          <img class="img-fluid" src="{{ asset('frontEnd/img/login.jpg') }}" alt="">
          <div class="hover">
            <h4>New To The KimBowny? Welcome?</h4>
            <p>Creating an account is fast, easy, and free. You'll be able to do fast re-orders, track your delivery, write reviews, and more!</p>
            <a class="primary-btn" href="{{route('register')}}">Create an Account</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="login_form_inner">
          <h3>Sign In To The KimBowny</h3>
          <form class="row login_form" action="{{ route('login') }}" method="post">
             @csrf
              <div class="col-md-12 form-group">
              <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span> @enderror
            </div>
            <div class="col-md-12 form-group">
              <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span> @enderror
            </div>
            <div class="col-md-12 form-group">
              <div class="creat_account">
                <input class="" type="checkbox" name="remember" id="remember" >
                <label for="f-option2">Keep me logged in</label>
              </div>
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" class="primary-btn">Log In</button> @if (Route::has('password.request')) <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a> @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Login Box Area =================--> 
@endsection