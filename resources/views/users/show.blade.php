@extends('layouts.app')

@section('css')
  @include('layouts.datatables_css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/work_order/work_order_content.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/user_profile/profile_styles.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link href="{{asset('fileInput/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
  <link href="{{asset('fileInput/fileinput-rtl.min.css')}}" media="all" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
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
    <div class="panel panel-default panel-custom profile-panel">
      <div class="panel-heading"><h4 style="display: inline-block">User Profile</h4></div>
      <div class="panel-body">

        <div class="row user-container">

          <div class="col-sm-6 avatar-container">
            <div class="image-holder" style="background-image: url( {{ $user->avatar ? asset('storage/user_images') .'/'. $user->avatar : asset('storage/user_images/user-icon.jpg') }} )">
              <a type="submit" class="btn-xs btn btn-default right-float delete-btn" href="{{ route('image.admin.delete',['userID' => $user->id]) }}">Remove</a>

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


                {!! Form::open(array('route' => 'image.admin.post','files' => true)) !!}
                <hr>
                <label class="scheduler-border">Image upload</label>


                <div class="input-group file-button">
                  <input type="file" id="input-id" name="image">
                  <input type="hidden" name="userID" value="{{ $user->id }}">

                </div>

                {!! Form::close() !!}
                </div>
                </div>

                <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
  </div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

<script type="text/javascript">

    $("#input-id").fileinput();

    $('.delete-btn').click(function(e) {

      e.preventDefault();

      swal({
      		title : "",
      		text : "Would you like to log out from the system?",
              type : "warning",
              showCancelButton: true,
              confirmButtonText: "Yes",
         },
      function(isConfirm){
        if (isConfirm) {
            window.location="{{ route('image.admin.delete',['userID' => $user->id]) }}"; // if you need redirect page

        }
      })
    })

</script>
@endsection
