@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/work_order/work_order_content.css')}}">

@endsection

@section('content')

  <section class="content-header">
    <nav>
        <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="{{ route('admin') }}">Admin</a></li>
        <li class="active"><span>Users</span></li>
      </ol>
    </nav>
  </section>

  <div class="content">
    <div class="panel panel-default panel-custom">
      <div class="panel-heading"><h4 style="display: inline-block">User Management</h4>
      <a class="btn btn-primary pull-right" style="margin-bottom: 5px" href="{!! route('users.create') !!}">New User</a>
      </div>
      <div class="panel-body">
      <div class="clearfix"></div>

      @include('flash::message')

      <div class="clearfix"></div>
      <div class="box box-primary">
          <div class="box-body">
              @include('users.table')
          </div>
      </div>

  </div>

</div>
</div>

@endsection

@section('scripts')

  @include('layouts.datatables_js')


  <script type="text/javascript">

  //Use sweetalert for order delete confirmation
  $(document).on('submit', '.delete-user', function(e){
    var form = this;

    e.preventDefault(); // <--- prevent form from submitting

    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete!'
    },
    function(isConfirm){
      if (isConfirm) {
          form.submit();
        } else {
          return;
        }
    });
  });

  //tooltip init
  $(document).ready(function(){
    $('html').tooltip({selector: '[data-toggle="tooltip"]'});
  });

  //DataTable settings
  orderTable = $('#users-table').DataTable({
       order: [[ 4, "desc" ]],
       columnDefs: [
           { orderable: false, targets: 5 }
         ],
       rowReorder: {
           selector: 'td:nth-child(2)'
       },
       responsive: true,
    });
  </script>

@endsection
