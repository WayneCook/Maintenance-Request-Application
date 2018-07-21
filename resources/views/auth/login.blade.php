<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('css\font-awesome.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="{{asset('css/home/home_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login/login-styles.css')}}">


</head>
<body class="hold-transition login-page">

  <div class="main-container">

  <nav>
    <div class='nav-content'>
      <h1><span>Whispering Fountians</span></h1>

    </div>
  </nav>


<div class="login-box">

    <div class="login-box-body">
        <p class="login-box-msg">LOGIN</p>

        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}">

              <input id="login" type="text"
                 class="input-lg form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                 name="login" value="{{ old('username') ?: old('email') }}" placeholder="Name or Email" required autofocus>

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('username') || $errors->has('email'))
           <span class="invalid-feedback">
               <p>{{ $errors->first('username') ?: $errors->first('email') }}</p>
           </span>
       @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control input-lg" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <p>{{ $errors->first('password') }}</p>
                </span>
                @endif

            </div>

              <div class="col">
                  <a href="{{ route('register') }}" class="text-center register-link">Register a new membership</a>
              </div>

              <div class="col">
                  <button type="submit" class="btn btn-primary btn-block btn-lg btn-flat btn-custom">Sign In</button>
              </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<footer class="home-footer">
    <p>Copyright © 2018. All rights reserved.</p>
</footer>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
