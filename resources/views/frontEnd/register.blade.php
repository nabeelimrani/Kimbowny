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
          <a href="{{ route('register') }}">register</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->
<!--================Login Box Area =================-->
<section class="login_box_area my-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <div class="login_form_inner">
          <h3>Sign Up To The KimBowny</h3>
          <form class="row login_form" action="{{ route('register') }}" method="post">
             @csrf
             @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
              <div class="col-md-12 form-group">
              <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

              @error('firstname')
              <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
               @enderror
            </div>   
            <div class="col-md-12 form-group">
              <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

               @error('lastname')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
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
              <input placeholder="Confirm Password" id="password_confirmation" type="password" class="form-control @error('confirm-pwd') is-invalid @enderror" name="password_confirmation" required autocomplete="current-confirm-pwd"> @error('password_confirmation') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span> @enderror
            </div> 
             <div class="col-md-12 form-group">
              <input placeholder="Invitation Code" type="text" class="form-control" name="referral_code" readonly value="{{$slug}}"> 
             @error('referral_code')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

            </div>
         
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" class="primary-btn">Register</button> 
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Login Box Area =================--> 
@endsection