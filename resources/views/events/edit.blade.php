@extends('layouts.app')
@section('css')
  <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/events/event_show.css') }}">
@endsection

@section('content')

  <section class="content-header">
    <nav>
        <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="{{ route('admin') }}">Admin</a></li>
        <li class="active"><a href="{{ route('events.index') }}">Events</a></li>
        <li class="active"><span>Edit Event</span></li>
      </ol>
    </nav>
  </section>

   <div class="content">

     <div class="panel panel-default panel-custom" style="max-width: 800px; margin: auto">
       <div class="panel-heading"><h4 class="panel-head" style="display: inline-block">Event</h4></div>

       <div class="panel-body">

       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($event, ['route' => ['events.update', $event->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('events.edit_fields')

                   {!! Form::close() !!}
               </div>
           </div>
         </div>
       </div>
     </div>
     <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
       </div>

@endsection

@section('scripts')
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <script type="text/javascript">

    $(function () {
      $('#datetimepicker1').datetimepicker();
      $('#datetimepicker2').datetimepicker();
    });

  </script>

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


  </script>
@endsection
