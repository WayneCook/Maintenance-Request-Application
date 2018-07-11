@extends('layouts.app')

@section('content')
  <section class="content-header">
    <nav>
        <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="{{ route('admin') }}">Admin</a></li>
        <li class="active"><span>Events</span></li>
      </ol>
    </nav>
  </section>

    <div class="content">

      <div class="register-box">

          <div class="register-box-body">
              <p class="login-box-msg">REGISTRATION</p>

              <form method="post" action="{{ url('admin/register') }}">

                  {!! csrf_field() !!}

                  <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                      <input type="text" class="form-control input-lg" name="username" value="{{ old('username') }}" placeholder="Name">
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>

                      @if ($errors->has('username'))
                          <span class="help-block">
                              <strong>{{ $errors->first('username') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Email">
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group has-feedback{{ $errors->has('unit_number') ? ' has-error' : '' }}">
                      <input type="text" class="form-control input-lg" name="unit_number" value="{{ old('unit_number') }}" placeholder="Apartment number">
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                      @if ($errors->has('unit_number'))
                          <span class="help-block">
                              <strong>{{ $errors->first('unit_number') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input type="password" class="form-control input-lg" name="password" placeholder="Password">
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                      <input type="password" name="password_confirmation" class="form-control input-lg" placeholder="Confirm password">
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                      @if ($errors->has('password_confirmation'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </span>
                      @endif
                  </div>


                      <div class="col">
                          <button type="submit" class="btn btn-primary btn-block btn-lg btn-flat btn-custom">Register</button>
                      </div>
                      <!-- /.col -->

              </form>


          </div>
      </div>





    </div>
@endsection
