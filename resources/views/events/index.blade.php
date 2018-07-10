@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/events/event_show.css') }}">
@endsection

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

      <div class="panel panel-default panel-custom">
        <div class="panel-heading"><h4 style="display: inline-block">Event Management</h4><h1 class="pull-right">
             <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('events.create') !!}">Add New</a>
          </h1></div>
        <div class="panel-body">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('events.table')
            </div>
        </div>
        <div class="text-center">

        </div>
      </div>
        </div>

    </div>
@endsection

@section('scripts')

  @include('layouts.datatables_js')


  <script type="text/javascript">

  $(document).ready(function(){
    $('html').tooltip({selector: '[data-toggle="tooltip"]'});
  });

  orderTable = $('#events-table').DataTable({

       rowReorder: {
           selector: 'td:nth-child(2)'
       },

       responsive: true,
    });
  </script>

@endsection
