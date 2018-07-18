@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/work_order/work_order_content.css')}}">

@endsection

@section('content')
  <section class="content-header">
    <nav>
        <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="{{ route('admin') }}">Admin</a></li>
        <li class="active"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="active"><span>Register User</span></li>
      </ol>
    </nav>
  </section>

    <div class="content">

      <div class="panel panel-default panel-custom" style="max-width: 450px; margin: auto">
        <div class="panel-heading"><h4 style="display: inline-block">Register User</h4>
        </div>
        <div class="panel-body">

      <div class="register">

          <div class="register-box-body">

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

                  <div class="form-group has-feedback{{ $errors->has('role_id') ? ' has-error' : '' }}">
                      <select class="form-control input-lg" name="role_id">
                        <option value="3" selected>Resident</option>
                        <option value="2">Maintanence</option>
                        <option value="1">Admin</option>
                      </select>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                      @if ($errors->has('role_id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('role_id') }}</strong>
                          </span>
                      @endif
                  </div>


                      <div class="col">
                          <button type="submit" class="btn btn-primary btn-block btn-lg btn-custom">Register</button>
                      </div>

              </form>


          </div>
        </div>
      </div>
      </div>

    </div>
@endsection
