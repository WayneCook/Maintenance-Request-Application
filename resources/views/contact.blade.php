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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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



    <section class="container-fluid section-container" id="scroll-point">


      <section class="mbr-section form4 cid-qv5Aq4h3k3" id="form4-2y" data-rv-view="9854">




    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d386950.6511603643!2d-73.70231446529533!3d40.738882125234106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNueva+York!5e0!3m2!1ses-419!2sus!4v1445032011908" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="col-md-6">
                <h2 class="pb-3 align-left mbr-fonts-style display-2">
                    Drop a Line
                </h2>
                <div>
                    <div class="icon-block pb-3">
                        <span class="icon-block__icon">
                            <span class="mbri-letter mbr-iconfont" media-simple="true"></span>
                        </span>
                        <h4 class="icon-block__title align-left mbr-fonts-style display-5">
                            Don't hesitate to contact us
                        </h4>
                    </div>
                    <div class="icon-contacts pb-3">
                        <h5 class="align-left mbr-fonts-style display-7">
                            Ready for offers and cooperation
                        </h5>
                        <p class="mbr-text align-left mbr-fonts-style display-7">
                            Phone: +1 (0) 000 0000 001 <br>
                            Email: youremail@mail.com
                        </p>
                    </div>
                </div>
                <div data-form-type="formoid">
                    <div data-form-alert="" hidden="">
                        Thanks for filling out the form!
                    </div>
                    <form class="block mbr-form" action="https://mobirise.com/" method="post" data-form-title="Mobirise Form"><input type="hidden" data-form-email="true" value="VyfBhjXY/U/Zmt1Pt1h8AUq3OZw8hzMN2LHhS02AKmRlJXOXYztQHFLe4ZtOqtsGZcolY6Zc/k02XjN6+grxxBoiXlO8zOY2aPEWv+XteZzFKh7BTcuG/y+UuTZ6thxI">
                        <div class="row">
                            <div class="col-md-6 multi-horizontal" data-for="name">
                                <input type="text" class="form-control input" name="name" data-form-field="Name" placeholder="Your Name" required="" id="name-form4-2y">
                            </div>
                            <div class="col-md-6 multi-horizontal" data-for="phone">
                                <input type="text" class="form-control input" name="phone" data-form-field="Phone" placeholder="Phone" required="" id="phone-form4-2y">
                            </div>
                            <div class="col-md-12" data-for="email">
                                <input type="text" class="form-control input" name="email" data-form-field="Email" placeholder="Email" required="" id="email-form4-2y">
                            </div>
                            <div class="col-md-12" data-for="message">
                                <textarea class="form-control input" name="message" rows="3" data-form-field="Message" placeholder="Message" style="resize:none" id="message-form4-2y"></textarea>
                            </div>
                            <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                <button href="" type="submit" class="btn btn-primary btn-form display-4">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>





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
