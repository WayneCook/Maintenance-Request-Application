@extends('layouts.app')

@section('css')

  @include('layouts.datatables_css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/work_order/work_order_content.css')}}">

@endsection

@section('loader')

    <div class="loader-wrapper">

      <img src="{{asset('images/loader.gif')}}" alt="loading-image">

    </div>

@endsection

@section('content')

    <section class="content-header">
      <nav>
          <ol class="breadcrumb breadcrumb-arrow">

      		<li><a href="{{ route('admin') }}">Admin</a></li>
      		<li class="active"><span>Work Orders</span></li>
      	</ol>
      </nav>

    </section>
    <div class="content">
      <div class="panel panel-default panel-custom">
        <div class="panel-heading"><h4 style="display: inline-block">Work Orders</h4><a class="btn btn-primary pull-right create-btn" style="margin-top: -10px; margin-bottom: 5px" id="add-modal">Add New</a></div>
        <div class="panel-body">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('work_orders.table')
            </div>
        </div>

    </div>
    @include('work_orders.modals')
  </div>
</div>

@endsection

@section('scripts')
  @include('layouts.datatables_js')
  <script type="text/javascript" src="{{asset('js/work_orders/order_ajax.js')}}"></script>
@endsection
