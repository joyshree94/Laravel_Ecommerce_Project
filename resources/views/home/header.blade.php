<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link {{ Request::is('/') ? 'active' :'' }}" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('aboutpage') ? 'active' :'' }}" href="{{ url('aboutpage') }}">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ Request::is('testimonial') ? 'active' :'' }}" href="{{ url('testimonial') }}">Testimonial</a>
               </li>
                <li class="nav-item">
                   <a class="nav-link {{ Request::is('product_page') ? 'active' :'' }}" href="{{ url('product_page') }}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link {{ Request::is('blogpage') ? 'active' :'' }}" href="{{ url('blogpage')}}">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link {{ Request::is('contactpage') ? 'active' :'' }}" href="{{ url('contactpage') }}">Contact</a>
                </li>
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('show_cart') ? 'active' :'' }}" href="{{ url('show_cart') }}" data-bs-toggle="tooltip" data-bs-title="Cart"><i class="fa-solid fa-cart-shopping"></i></a>
               </li>
               <li class="nav-item">
                  <a data-bs-toggle="tooltip" data-bs-title="Order List" class="nav-link {{ Request::is('show_order') ? 'active' :'' }}" href="{{ url('show_order') }}"><i class="fa-solid fa-list-ul"></i></a>
                  
               </li>
               
                <form class="form-inline">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                 
               </form>
              
               <li class="nav-item">
                  <x-app-layout>
 
                  </x-app-layout>
               </li>
               @else
                <li class="nav-item">
                  <a data-bs-toggle="tooltip" data-bs-title="login" class="btn btn-primary" id="logincss" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i></a>
               </li>
               <li class="nav-item">
                  <a data-bs-toggle="tooltip" data-bs-title="register" class="btn btn-success" href="{{ route('register') }}"><i class="fa-solid fa-person-breastfeeding"></i></a>
               </li>
               @endauth
                @endif
             </ul>
          </div>
       </nav>
    </div>
 </header>