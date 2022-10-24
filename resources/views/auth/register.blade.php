@extends('layouts.auth', ['title' => 'Registration'])

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
          </div>
          <form class="user" autocomplete="off" method="POST" action="{{ route('registration') }}">
            @csrf
            <div class="form-group mb-3">
              <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}" />
              @error('username')
              <div class="ml-3 invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <input type="text" class="form-control form-control-user @error('fullname') is-invalid @enderror" name="fullname" id="fullname" placeholder="Fullname" value="{{ old('fullname') }}" />
              @error('fullname')
              <div class="ml-3 invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" />
              @error('email')
              <div class="ml-3 invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" />
                @error('password')
                <div class="ml-3 invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user @error('repeat_password') is-invalid @enderror" name="repeat_password" id="repeat_password" placeholder="Repeat Password" />
                @error('repeat_password')
                <div class="ml-3 invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
              Register Account
            </button>
          </form>
          <hr />
          {{-- <div class="text-center">
            <a class="small" href="forgot-password.html">Forgot Password?</a>
          </div> --}}
          <div class="text-center">
            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
