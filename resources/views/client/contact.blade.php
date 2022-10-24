@extends('layouts.main')

@section('title', 'Contact')

@section('content')
<!-- Contact -->
<section id="contact" class="pt-5">
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <h2>Contact Me</h2>
      </div>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="email">
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Messages</label>
            <textarea class="form-control" id="messages" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#212529" fill-opacity="1" d="M0,96L48,117.3C96,139,192,181,288,186.7C384,192,480,160,576,128C672,96,768,64,864,90.7C960,117,1056,203,1152,213.3C1248,224,1344,160,1392,128L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
  </svg>
</section>
<!-- Akhir dari contact -->
@endsection
