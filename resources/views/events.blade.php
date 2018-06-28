@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/admin/admin-styles.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/events/events_styles.css')}}">
@endsection

@section('content')
<div class="main-container">


  <div class="jumbotron jumbotron-fluid jumbotron-custom" style="background-image: url('{{asset('images/backgrounds/memphis-colorful.png')}}')">
    <div class="container">
      <h1 class="display-3">Event Signups</h1>
      <p class="lead">Want to attend an up coming event? Sign up and lets have some fun!</p>
    </div>
  </div>

  <div class="container bread-custom">
    <nav>
        <ol class="breadcrumb breadcrumb-arrow">

        <li><a href="{{ route('admin') }}">Admin</a></li>

      </ol>
    </nav>
</div>

<div class="container box-row-container">
  <div class="row box-row">

    <div class="card col-lg-4 col-md-4 col">
      <div class="card-content">
        <span class="date-banner">12/12/18 3:00pm</span>
        <span class="card-img-cont" style="background-image: url('https://static1.gamepoint.net/gpinternational/rc/blog/gpinternational/1497535613/blogimage_2017_marathon_fri16/default/en')" alt="Card image cap"></span>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <div class="button-group">

          <a href="#" class="btn btn-primary">Sign up</a>
          <a href="#" class="btn btn-default pull-right">Details</a>
        </div>
        </div>
      </div>
    </div>

    <div class="card col-lg-4 col-md-4 col">
      <div class="card-content">
      <span class="date-banner">12/12/18 3:00pm</span>
      <span class="card-img-cont" style="background-image: url('https://static1.gamepoint.net/gpinternational/rc/blog/gpinternational/1497535613/blogimage_2017_marathon_fri16/default/en')" alt="Card image cap"></span>

      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Sign up</a>
        <a href="#" class="btn btn-default pull-right">Details</a>
      </div>
    </div>
  </div>


    <div class="card col-lg-4 col-md-4 col">
      <div class="card-content">
      <span class="date-banner">12/12/18 3:00pm</span>
      <span class="card-img-cont" style="background-image: url('https://static1.gamepoint.net/gpinternational/rc/blog/gpinternational/1497535613/blogimage_2017_marathon_fri16/default/en')" alt="Card image cap"></span>

      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Sign up</a>
        <a href="#" class="btn btn-default pull-right">Details</a>
      </div>
    </div>
  </div>

  </div>
</div>

</div>
@endsection
