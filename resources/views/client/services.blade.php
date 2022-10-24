@extends('layouts.main')

@section('title', 'Services')

@section('content')
<!-- Services -->
<section id="services" class="py-5">
  <div class="container">
    <div class="row text-center mb-5">
      <h2>Services</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card pb-2 mb-4">
          <img src="{{ asset('images/web.jpg') }}" class="card-img-top" alt="Web Programming">
          <div class="card-body">
            <h5 class="card-title mb-4">Web Programming</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card pb-2 mb-4">
          <img src="{{ asset('images/uiux.png') }}" class="card-img-top" alt="UIUX Design">
          <div class="card-body">
            <h5 class="card-title mb-4">UIUX Design</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card pb-2 mb-4">
          <img src="{{ asset('images/gui.jpg') }}" class="card-img-top" alt="GUI App">
          <div class="card-body">
            <h5 class="card-title mb-4">GUI App</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Akhir dari services -->
@endsection
