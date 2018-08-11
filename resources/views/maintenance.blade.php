@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/admin/admin-styles.css')}}">
@endsection

@section('content')
<div class="main-container">

  <section class="content-header">
    <nav>
      <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="{{ route('maintenance') }}">Dashboard</a></li>
      </ol>
    </nav>
  </section>

  <div class="row box-row">

    <a href="{{route('workOrders.index')}}">
      <div class="content-box col-md-6">
        <div class="box-container">
            <i class="fa fa-wrench section-icons"></i>
            <h2>Work Orders</h2>
            <span class="bottom-line"></span>
        </div>
      </div>
    </a>

    <a href="{{route('showEvents')}}">
      <div class="content-box col-md-6">
        <div class="box-container">
          <i class="fa fa-calendar section-icons"></i>
          <h2>Events</h2>
          <span class="bottom-line"></span>
        </div>
      </div>
    </a>
  </div>
</div>
@endsection
