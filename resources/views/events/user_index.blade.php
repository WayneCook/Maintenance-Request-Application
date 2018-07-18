@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/admin/admin-styles.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/events/events_styles.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
@endsection

@section('content')
<div class="main-container">
  <div class="container bread-custom">
    <nav>
      <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="{{ route('admin') }}">Admin</a></li>
        <li class="active"><span>Events</span></li>
      </ol>
    </nav>
  </div>

  <div class="jumbotron jumbotron-fluid jumbotron-custom">
    <div class="container">
      <h1 class="display-3">Event Signups</h1>
      <p class="lead">Want to attend an up coming event? Sign up and lets have some fun!</p>
    </div>
  </div>

  <div class="container box-row-container">
    <div class="row box-row">

    @foreach ($events as $event)

      <div class="card col-lg-4 col-md-4 col">
        <div class="card-content">
          <span class="date-banner">{{ date("m/d/y g:i A", strtotime($event->start_date)) }}</span>
          <span class="card-img-cont {{ $event->status }}" style="background-image: url('{{asset('storage/event_images/' . $event->image)}}')" alt="Card image cap">
              <i class="fa fa-check check-icon"></i>
          </span>
          <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <p class="card-text">{{ $event->description }}</p>
            <div class="button-group">
              <form class="event-form" action="" data-title="{{ $event->title }}" method="post">
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                <button type="submit" name="submit-btn" class="btn btn-primary signup-btn">Sign up</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/sweetalert.js') }}"></script>

<script type="text/javascript">

//Check if user is already signed up
$(document).ready(function(){
  checkIfSignedUp();
})

  $(document).on('submit', '.event-form', function(e){
    var form = this;
    var title = $(this).attr("data-title").toLowerCase();

    var formTransform = $(this).serialize();
    event.preventDefault();

    swal({
      title: 'Sign up for ' + title + '?',
      text: "You will be signing up for this event!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sign Up!'
    },
    function(isConfirm){
      if (isConfirm) {

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
             type: 'POST',
             url: '/signup',
             data: formTransform,
             success: function(data) {

               if (data == 'isSignedUp') {

                 console.log('is signed up');
                 swal({
                    title: "Signed up!",
                    text: "You are already signed up for this event!",
                    icon: "success",
                    button: "OK",
                    confirmButtonColor: '#3085d6'
                  });
               } else {
                 swal({
                   type: 'success',
                    title: "You are signed up!",
                    text: "You successfully signed up for this event, see you soon!",
                    icon: "success",
                    button: "OK",
                    confirmButtonColor: '#3085d6'
                  });
                 checkIfSignedUp();
               }
             }
         });

        } else {
          return;
        }
    });
  })

function checkIfSignedUp() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
     type: 'get',
     url: '/signup',
     success: function(data) {

       $('.check-icon').each(function(index, val){

         if (data[index] == true) {
           $(val).show();
         } else {
           $(val).hide();
         }

       });
     }
  })
}
</script>
@endsection
