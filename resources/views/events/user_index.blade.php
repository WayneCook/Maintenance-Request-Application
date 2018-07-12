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
          <span class="date-banner">{{ date("d/m/y g:i A", strtotime($event->start_date)) }}</span>
          <span class="card-img-cont" style="background-image: url('{{asset('storage/event_images/' . $event->image)}}')" alt="Card image cap"></span>
          <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <p class="card-text">{{ $event->description }}</p>
            <div class="button-group">
            <a href="#" class="btn btn-primary signup-btn">Sign up</a>
            <a href="#" class="btn btn-default pull-right">Details</a>
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
<script type="text/javascript" src="{{ asset('js/sweetalert.js') }}">

</script>

<script type="text/javascript">

$(document).ready(function(){

  $(document).on('click', '.signup-btn', function(){

    console.log($(this).val());

    swal({
    title: "Sign up for event?",
    text: "Leave a comment:",
    type: "input",
    showCancelButton: true,
    closeOnConfirm: false,
    confirmButtonText: "Sign up!",
    confirmButtonColor: '#3085d6',
    inputPlaceholder: "Comment"
    }, function (inputValue) {
      if (inputValue === false) return false;
      if (inputValue === "") {
        swal.showInputError("You need to write something!");
        return false
      }
      swal("Nice!", "You wrote: " + inputValue, "success");
    });
  })
})

</script>
@endsection
