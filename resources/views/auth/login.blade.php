@extends('layouts.auth', ['title' => 'Login'])

@section('content')
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                @if($msg = Session::get('success'))
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {!! $msg !!}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>
                @elseif($msg = Session::get('error'))
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {!! $msg !!}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>
                @endif
              </div>
              <form class="user" action="{{ route('authenticate') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                  <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('email') }}">
                  @error('email')
                  <div class="ml-3 invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                  @error('password')
                  <div class="ml-3 invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" autocomplete="off">
                    <label class="custom-control-label" for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </form>
              <hr>
              {{-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div> --}}
              {{-- <div class="text-center">
                <a class="small" href="{{ route('register') }}">
              Don't have an account? Register now!
              </a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</div>
@endsection
