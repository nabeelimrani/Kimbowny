@extends('admin_side.layouts.app')

@section('content')
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="login-logo">
                    <img src="{{ asset('assets/logo.jpg') }}" style="border-radius:10px;" width=65>
                    <a href="#"
                        style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                  background: rgba(255, 255, 255, 0.2);
                  color: rgb(0, 0, 0);
                  text-shadow:  2px 2px 4px rgba(17, 28, 182, 0.363);
                  padding: 4px 4px;
                  border-radius: 12px;
                  text-decoration: none;
                  display: inline-block;">
                        <strong style="font-weight: bold;">KIMBOWNY</strong> Pet Shop
                    </a>


                </div>
                <div class="card" style="background: rgba(255, 255, 255, 0.3);">



                    <div class="card-body">
                        <p class="login-box-msg" style="font-weight: bold;">Sign in to start your session</p>
                        <form method="POST" action="{{ route('admin.loginsubmit') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <input id="email" type="email" placeholder="Email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="input-group mb-3">

                                <input id="password" placeholder="Password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">

                                <div class="col-4 offset-4">
                                    <button type="submit" class="btn btn-primary btn-block" style="border-radius: 10px;">
                                        <i class="fa fa-sign-in-alt"></i> Sign In
                                    </button>
                                </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
