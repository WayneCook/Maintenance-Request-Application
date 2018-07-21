@extends('layouts.app')

@section('css')

  <link rel="stylesheet" type="text/css" href="{{asset('css/events/event_show.css')}}">
@endsection

@section('content')


<section class="content-header">
  <nav>
      <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="{{ route('admin') }}">Admin</a></li>
        <li><a href="{{ route('events.index') }}">Events</a></li>
        <li class="active"><span>View</span></li>
    </ol>
  </nav>
</section>


<div class="content">
  <div class="card col-lg-4 col-md-4 col">
    <div class="card-content">
      <span class="date-banner">{{ date("m/d/y g:i A", strtotime($event->start_date)) }}</span>
      <span class="card-img-cont" style="background-image: url('{{ asset('storage/event_images/' . $event->image) }}')" alt="Card image cap"></span>
      <div class="card-body">
        <h5 class="card-title">{{ $event->title }}</h5>
        <p class="card-text">{{ $event->description }}</p>
        @if (!empty($event->users))
        <hr>
        <h3>Signup List</h3>
        @foreach ($event->users as $value)
          <p>{{$value->username}}</p>
        @endforeach
      @endif
      </div>
    </div>
  </div>
</div>

@endsection
