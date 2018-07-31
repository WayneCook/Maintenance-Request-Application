@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/admin/admin-styles.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/contact/contact_page.css')}}">
@endsection

@section('content')
<div class="main-container">

  <section class="content-header">
    <nav>
      <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="{{ route('dash') }}">Dashboard</a></li>
        <li class="active"><span>Contact us</span></li>
      </ol>
    </nav>
  </section>

  <div class="content">

    <div class="panel panel-default panel-custom">
      <div class="panel-heading"><h4 style="display: inline-block">Emergency Contact</h4>
      </div>
      <div class="panel-body">
        <p>Phone: 1800-888-7888</p>
      </div>
    </div>
  </div>

  <div class=" form-wrapper">

    <div class="col-md-6 form-width">
      <div class="innerWrapper">
        <div>
          <div >
            <h2 class="form-heading">Send us a message!</h2>
          </div>
        </div>

        <form class="message-form" action="#" method="post">
          <div class="form-row">

            <div class="col">
              <div class="form-group col-md-6">
                    <input type="text" class="form-control input input-md" name="name" placeholder="Your Name" required id="name">
              </div>
            </div>

            <div class="col">
              <div class="form-group col-md-6">
                    <input type="text" class="form-control input input-md" name="phone" placeholder="Phone" id="phone">
              </div>
            </div>

            <div class="col">
              <div class="form-group col-md-12">
                  <input type="text" class="form-control input input-md" name="email" placeholder="Email" id="email">
              </div>
            </div>

            <div class="col">
              <div class="form-group col-md-12" data-for="message">
                  <textarea class="form-control input input-md" name="message" rows="6" placeholder="Message" required maxlength=500 style="resize:none" id="message"></textarea>
              </div>
            </div>

            <div class="col">
              <div class="form-group col-md-12" style="margin-top: 10px;">
                <button type="submit" class="btn btn-md btn-primary msg-button">SEND MESSAGE</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript">

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

function clearForm() {

  $('#name').val('');
  $('#email').val('');
  $('#phone').val('');
  $('#message').val('');

}


  </script>
@endsection
