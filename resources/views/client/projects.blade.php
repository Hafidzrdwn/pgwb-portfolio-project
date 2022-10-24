@extends('layouts.main')

@section('title', 'My Projects')

@section('content')
<!-- Projects -->
<section id="projects" class="pt-5">
  <div class="container">
    <div class="row text-center mb-5">
      <div class="col">
        <h2>My Projects</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card shadow mb-4">
          <img src="{{ asset('images/pj1.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Online Course Static Web</h5>
            <p class="card-text">HTML 5 + CSS 3 + ES 6 + Gsap</p>
            <a href="https://create-on.netlify.app/" target="_blank" class="btn btn-primary">Web Preview..</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow mb-4">
          <img src="{{ asset('images/pj2.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Scissors Rock Paper Game</h5>
            <p class="card-text">ES 6 Basic Game</p>
            <a href="https://hafidzrdwn.github.io/ScissorsRockPaperGame/" target="_blank" class="btn btn-primary">Web Preview..</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow mb-4">
          <img src="{{ asset('images/pj3.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Education Website</h5>
            <p class="card-text">BS 5 + ES 6</p>
            <a href="https://hafidzrdwn.github.io/CulturePedia/" target="_blank" class="btn btn-primary">Web Preview..</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow mb-4">
          <img src="{{ asset('images/pj4.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Simple Landing Page</h5>
            <p class="card-text">HTML 5 + CSS 3 + ES 6</p>
            <a href="https://fruitsociety.netlify.app/" target="_blank" class="btn btn-primary">Web Preview..</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow mb-4">
          <img src="{{ asset('images/pj5.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Survey Form Website</h5>
            <p class="card-text">HTML 5 + CSS 3 + Google Spreadsheet DB</p>
            <a href="https://hafidzrdwn.github.io/SurveyForm-FCC/" target="_blank" class="btn btn-primary">Web Preview..</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow mb-4">
          <img src="{{ asset('images/pj6.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Tribute Page</h5>
            <p class="card-text">HTML 5 + CSS 3</p>
            <a href="https://hafidzrdwn.github.io/TributePage-FCC/" target="_blank" class="btn btn-primary">Web Preview..</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,0L120,37.3C240,75,480,149,720,165.3C960,181,1200,139,1320,117.3L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
  </svg>
</section>
<!-- Akhir dari Projects -->
@endsection
