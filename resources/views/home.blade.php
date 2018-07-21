<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/grid/bootstrap.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home/section-styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home/home_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home/home-responsive.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/home/login-styles.css')}}"> --}}

  </head>
  <body>

    <nav>
      <div class='nav-content'>
        <h1><span>Whispering Fountians</span></h1>
        <a href="{{route('login')}}">
        <p>LOGIN</p>
      </a>
      </div>
    </nav>

  <main>

      <div class="image-slider">
        <div class="image-one slide"></div>
        <div class="image-two slide"></div>
        <div class="image-three slide"></div>
      </div>

      <div class='headline-container'>
        <h1>WHISPERING FOUNTIANS<br>APARTMENTS</h1>
        <div class="button-container">

          {{-- <a class='register-button nounderline' href='{{route('register')}}'><i class="fa fa-user-plus"></i> TENANT REGISTRATION</a> --}}
          <a class='register-button nounderline' href="{{route('register')}}"><i class="fa fa-user-plus"></i> TENANT REGISTRATION</a>
        </div>

      </div>
      <div class="arrow-container">
        <i class="fa fa-angle-down" id="arrow"></i>
      </div>
    </main>

    <section class="container-fluid section-container" id="scroll-point">
      <article class="section-details">
        <p>Stay Connected! Registration for Whispering Fountains at Monrovia is now open. Registered tenants will gain access to services requests, event signups and much more.</p>
      </article>
      <div class="row box-row">

        <a href="{{route('login')}}">
        <div class="content-box col-md-4">
          <div class="box-container">
              <i class="fa fa-calendar section-icons"></i>
              <h2>Event Signup</h2>
              <span class="bottom-line"></span>
          </div>
        </div>
      </a>

      <a href="{{route('login')}}">
        <div class="content-box col-md-4">
          <div class="box-container">
              <i class="fa fa-wrench section-icons"></i>
              <h2>Maintanence Request</h2>
              <span class="bottom-line"></span>
          </div>
        </div>
      </a>

        <a href="{{route('login')}}">
        <div class="content-box col-md-4">
          <div class="box-container">
              <i class="fa fa-envelope section-icons"></i>
              <h2>Contact Us</h2>
              <span class="bottom-line"></span>
          </div>
        </div>
      </div>
    </a>

    </section>

    <footer class="home-footer">
        <strong>Copyright © 2018. All rights reserved.
    </footer>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <script type="text/javascript">


    $('.image-slider').slick({

      autoplay: true,
      autoplaySpeed: 2000,
      prevArrow: false,
      nextArrow: false,
      fade: true,
      speed: 2800
    });



    </script>

  </body>
</html>
