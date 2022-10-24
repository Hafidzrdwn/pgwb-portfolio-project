@extends('layouts.admin', ['title' => 'Change Password'])

@section('header', 'Change Password')


@section('content')
<div class="row mb-5">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('change_password') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-12">
              @if($msg = Session::get('success'))
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $msg }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
              @elseif($msg = Session::get('status'))
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $msg }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
              @endif

              <div class="form-group">
                <label class="bmd-label-floating" for="old-password">Password Lama</label>
                <input type="password" id="old-password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Masukkan password lama anda..">
                @error('old_password')
                <div class="mt-1 invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating" for="new-password">Password Baru</label>
                <input type="password" id="new-password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password baru..">
                @error('password')
                <div class="mt-1 invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating" for="confirm-password">Konfirmasi Password Baru</label>
                <input type="password" id="confirm-password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi password baru..">
                @error('password_confirmation')
                <div class="mt-1 invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>

          <div class="card-footer  text-center">
            <button type="submit" class="btn btn-info">Change Password</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
