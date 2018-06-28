@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/admin/admin-styles.css')}}">
@endsection

@section('content')
<div class="main-container">

  <section class="content-header">
    <nav>
        <ol class="breadcrumb breadcrumb-arrow">

        <li><a href="{{ route('dash') }}">Dashboard</a></li>

      </ol>
    </nav>
  </section>

    <div class="row box-row">
      <a href="{{route('user_work_order')}}">
        <div class="content-box col-md-4">
          <div class="box-container">
              <i class="fa fa-wrench section-icons"></i>
              <h2>Maintenance Request</h2>
              <span class="bottom-line"></span>
          </div>
        </div>
      </a>

      <a href="{{route('login')}}">
      <div class="content-box col-md-4">
        <div class="box-container">
            <i class="fa fa-calendar section-icons"></i>
            <h2>Event Signup</h2>
            <span class="bottom-line"></span>
        </div>
      </div>
    </a>

    @if ( Auth::user()->role_id !== 1 )

      <a href="{{ route('users.index') }}">
      <div class="content-box col-md-4">
        <div class="box-container">
            <i class="fa fa-envelope section-icons"></i>
            <h2>Contact Us</h2>
            <span class="bottom-line"></span>
        </div>
      </div>
    </div>
  </a>

    @else

      <a href="{{ route('users.index') }}">
        <div class="content-box col-md-4">
          <div class="box-container">
            <i class="fa fa-envelope section-icons"></i>
            <h2>User Management</h2>
            <span class="bottom-line"></span>
          </div>
        </div>
      </div>
    </a>

    @endif


</div>
@endsection
