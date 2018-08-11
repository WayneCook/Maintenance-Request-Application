<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" type="text/css" href="{{asset('css/grid/bootstrap.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home/section-styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home/home_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home/home-responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
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

        <a href="{{route('register')}}">
          <div class="content-box col-md-4">
            <div class="box-container">
                <i class="fa fa-user-plus section-icons"></i>
                <h2>Registration</h2>
                <span class="bottom-line"></span>
            </div>
          </div>
        </a>
      </div>
    </section>

    <div class="row contact-section">
      <div class="col-md-6 map-wrapper">
        <div class="innerWrapper">
          <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3302.1319261188323!2d-117.98518738428784!3d34.14296678058146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2d90558d508c9%3A0x569fb5cb0b175b6e!2s1024+Royal+Oaks+Dr%2C+Monrovia%2C+CA+91016!5e0!3m2!1sen!2sus!4v1532478950110" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>

      <div class="col-md-6 form-wrapper">
        <div class="innerWrapper">
          <div>
            <div >
              <h1 class="form-heading">Send us a message!</h1>
            </div>
          </div>

          <form class="message-form" action="#" method="post">
            <div class="form-row">

            <div class="col">
              <div class="form-group col-md-6">
                    <input type="text" class="form-control input input-lg" name="name" placeholder="Your Name" required id="name">
              </div>
            </div>

            <div class="col">
              <div class="form-group col-md-6">
                    <input type="text" class="form-control input input-lg" name="phone" placeholder="Phone" id="phone">
              </div>
            </div>

            <div class="col">
              <div class="form-group col-md-12">
                  <input type="text" class="form-control input input-lg" name="email" placeholder="Email" id="email">
              </div>
            </div>

            <div class="col">
              <div class="form-group col-md-12" data-for="message">
                  <textarea class="form-control input input-lg" name="message" rows="6" placeholder="Message" required maxlength=500 style="resize:none" id="message"></textarea>
              </div>
            </div>

            <div class="col">
              <div class="form-group col-md-12" style="margin-top: 10px;">
                <button href="" type="submit" class="btn btn-lg btn-primary msg-button">SEND MESSAGE</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

    <footer class="home-footer">
        <strong>Copyright © 2018. All rights reserved.
    </footer>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.js') }}"></script>
    <script type="text/javascript">

    $('.image-slider').slick({

      autoplay: true,
      autoplaySpeed: 2000,
      prevArrow: false,
      nextArrow: false,
      fade: true,
      speed: 2800
    });

    $('.message-form').on('submit', function(event) {

      event.preventDefault();
      formData = $(this).serializeArray();

      var formDataObj = {};

      $.each(formData, function(key, val){
        formDataObj[val.name] = val.value;
      })

      //Ajax request to send message
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
         type: 'post',
         url: 'messager',
         data: formDataObj,
         success: function(data) {

           console.log(data);

           if (data == 'success') {

             swal({
              type: 'success',
              title: 'Message sent!',
              text: 'Thank you, your message has been successfully sent.',
              confirmButtonColor: '#337ab7'
            })
            clearForm();
          } else {
            swal({
             type: 'warning',
             title: 'Oops something went wrong!',
             text: 'Your message was not sent, please try again later. Thank you',
             confirmButtonColor: '#337ab7'
           })
           clearForm();
          }
       }
    })
  })

  //Clear the message form
  function clearForm() {

    $('#name').val('');
    $('#email').val('');
    $('#phone').val('');
    $('#message').val('');
  }
  </script>

  </body>
</html>
