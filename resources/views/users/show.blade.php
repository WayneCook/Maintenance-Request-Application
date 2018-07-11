@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/work_order/work_order_content.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/user_profile/profile_styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

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


                  <label class="scheduler-border">Image upload</label>
                {!! Form::open(array('route' => 'image.admin.post','files' => true)) !!}



                <div class="input-group file-button">

                    <label class="input-group-btn">
                        <span class="btn btn-primary">
                            Browse&hellip; <input type="file" name="image" style="display: none;">
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div>
                <button type="submit" class="btn btn-success btn-block upload-btn">Upload</button>

                    <input type="hidden" name="userID" value="{{ $user->id }}">

                </div>
                </div>
                {!! Form::close() !!}

                <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
  </div>

</div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <script type="text/javascript">


  $(function() {

    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });

    // We can watch for our custom `fileselect` event like this
    $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
    });

  });


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

      } else {

      }
        })



  })

  </script>
@endsection
