<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('error/style.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
    <nav>
        <div class="menu">
            <p class="website_name">Sohel Arman</p>
            <div class="menu_links">
                <a href="{{ route('Homepage') }}" class="link">Home</a>
                @if (Route::has('login'))
                @auth
                <li><a href="{{ route('home') }}">Dashboard</span></a></li>
                @else
                <a href="{{ route('login') }}" class="link">Sign In</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="link">Sign Up</a>
                @endif
                @endauth
            @endif
            </div>
            <div class="menu_icon">
                <span class="icon"></span>
            </div>
        </div>
    </nav>
    @yield('code')
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="{{ asset('error/script.js') }}"></script>

</body>
</html>
