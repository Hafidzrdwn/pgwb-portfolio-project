 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-m">
   <div class="container">
     <a class="navbar-brand fw-bolder" href="{{ route('home') }}">
       <img src="{{ asset('images/nav-brand.svg') }}" alt="" class="d-inline-block align-text-top">
     </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNavDropdown">
       <ul class="navbar-nav ms-auto">
         <li class="nav-item">
           <a class="nav-link @if(Request::is('/')) active @endif" aria-current="page" href="{{ route('home') }}">Home</a>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle @if(Request::segment(1) == 'abouts') active @endif" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Abouts
           </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <li><a class="dropdown-item @if(Request::is('abouts/about')) active @endif" href="{{ route('about') }}">About me</a></li>
             <li><a class="dropdown-item @if(Request::is('abouts/services')) active @endif" href="{{ route('services') }}">Services</a></li>
             <li><a class="dropdown-item @if(Request::is('abouts/skills')) active @endif" href="{{ route('skills') }}">Skills</a></li>
           </ul>
         </li>
         <li class="nav-item">
           <a class="nav-link @if(Request::is('projects')) active @endif" href="{{ route('projects') }}">Projects</a>
         </li>
         <li class="nav-item">
           <a class="nav-link @if(Request::is('contact')) active @endif" href="{{ route('contact') }}">Contact</a>
         </li>
       </ul>
     </div>
   </div>
 </nav>
 <!-- Akhir Navbar -->
