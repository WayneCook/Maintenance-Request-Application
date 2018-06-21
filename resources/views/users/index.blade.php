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
      <div class="panel-heading"><h4 style="display: inline-block">User Management</h4></div>
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
  orderTable = $('#users-table').DataTable({
    
       rowReorder: {
           selector: 'td:nth-child(2)'
       },

       responsive: true,
    });
  </script>

@endsection
