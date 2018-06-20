@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/work_order/work_order_content.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/user_profile/profile_styles.css')}}">

@endsection

@section('content')

  <section class="content-header">
    <nav>
        <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="{{ route('admin') }}">Admin</a></li>
        <li class="active"><span>User Profile</span></li>
      </ol>
    </nav>
  </section>

  <div class="content">
    <div class="panel panel-default panel-custom">
      <div class="panel-heading"><h4 style="display: inline-block">User Profile</h4></div>
      <div class="panel-body">

        <div class="row user-container">

          <div class="col-sm-6">
            <div class="image-holder" style="background-image: url( {{ Auth::user()->avatar ? asset('images/user_images') .'/'. Auth::user()->avatar : asset('images/user-icon.jpg') }} )">
            </div>
          </div>

          <div class="col-sm-6">

                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row user-details" style="padding-left: 20px">
                            @include('users.show_fields')
                        </div>
                    </div>
                </div>

          </div>
        </div>


        @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                </div>

                <img src="images/{{ Session::get('image') }}">

                @endif



                @if (count($errors) > 0)

                    <div class="alert alert-danger">

                        <strong>Whoops!</strong> There were some problems with your input.

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif



                {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}

                    <div class="row">

                        <div class="col-md-6">

                            {!! Form::file('image', array('class' => 'form-control')) !!}

                        </div>

                        <div class="col-md-6">

                            <button type="submit" class="btn btn-success">Upload</button>

                        </div>

                    </div>

                {!! Form::close() !!}




      <div class="box box-primary">
          <div class="box-body">

          </div>
      </div>
      <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>

  </div>

</div>
</div>




@endsection
