@extends('layouts.main')

@section('title', 'Hafidzrdwn')

@section('content')
<!-- Jumbotron -->
<section class="jumbotron text-center">
  <img src="{{ asset('images/profile.jpg') }}" alt="Hafidz Ridwan" width="200" class="rounded-circle img-thumbnail">
  <h1 class="mt-3">Hafidz Ridwan Cahya</h1>
  <p class="lead">Software Engineering Student | Musician</p>
  <div class="container">
    <div class="row icons justify-content-center mt-5 mb-3">
      <div class="col-8 col-lg-4">
        <div class="row">
          <div class="col">
            <a href="https://www.instagram.com/hafidzrdwn/" target="_blank"><i class="icon1 fab fa-instagram"></i></a>
          </div>
          <div class="col">
            <a href="https://www.linkedin.com/in/hafidz-ridwan-cahya-b54426215/" target="_blank"><i class="icon2 fab fa-linkedin"></i></a>
          </div>
          <div class="col">
            <a href="https://github.com/Hafidzrdwn" target="_blank"><i class="icon3 fab fa-github"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,64L48,58.7C96,53,192,43,288,74.7C384,107,480,181,576,197.3C672,213,768,171,864,133.3C960,96,1056,64,1152,64C1248,64,1344,96,1392,112L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
  </svg>
</section>
<!-- Akhir Jumbotron -->
@endsection
