<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
  <title> My Portfolio | @yield('title')</title>
</head>
<body>
  @include('partials.navbar')
  @yield('content')
  <!-- Footer -->
  <footer class="bg-dark text-light py-5 text-center">
    <p class="m-0">Created with <i class="fas fa-heart text-danger"></i> by <a class="text-light fw-bold" href="https://www.instagram.com/hafidzrdwn/" target="_blank">Hafidzrdwn</a> | 2021</p>
  </footer>
  <!-- Akhir dari Footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ba150134be.js" crossorigin="anonymous"></script>
</body>
</html>
