@extends('layouts.app')
@section('css')

  @include('layouts.datatables_css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/work_order/user_workorder_styles.css')}}">

@endsection

@section('content')

<section class="content-header">
  <nav>
      <ol class="breadcrumb breadcrumb-arrow">
      <li><a href="{{ route('admin') }}">Dashboard</a></li>
      <li class="active"><span>Work Orders</span></li>
    </ol>
  </nav>
</section>

<div class="content">
  @include('adminlte-templates::common.errors')
    <div class="panel panel-default panel-custom">
      <div class="panel-heading"><h4 style="display: inline-block">Create Work Order</h4></div>
        <div class="panel-body">
          <form class="form needs-validation" novalidate role="form" id="create-form">
                  {!! csrf_field() !!}
            <div class="form-row">
                <div class="col">
                <div class="form-group col-sm-6">

                  <label class="control-label" for="id">Name:</label>
                  <input type="name" value="{{ Auth::user()->username }}" name="name" class="form-control show-order-data" id="name" autocomplete="off" readonly>
                  <small class="text-danger" name="name"></small>
                </div>
              </div>

              <div class="col">
                <div class="form-group col-sm-6">
                  <label class="control-label" for="title">Apartment number:</label>
                  <input type="text" name="unit_number" class="form-control show-order-data" value="{{ Auth::user()->unit_number }}" id="unit_number" autocomplete="off" readonly>
                  <small class="text-danger" name="unit_number"></small>
                </div>
              </div>


            </div> <!---End row---->

            <div class="form-row">
              <div class="col">
                <div class="form-group col-sm-6">
                  <label class="control-label" for="title">Category:</label>
                  <input type="text" name="category" class="form-control show-order-data" id="category" autocomplete="off">
                  <small class="text-danger" name="category"></small>
                </div>
              </div>


              <div class="col">
                <div class="form-group col-sm-6">
                  <label class="control-label" for="id">Permission to enter:</label>
                  <select class="form-control show-order-data change-status" name="permission_to_enter" id="permission_to_enter" autocomplete="off">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                  <small class="text-danger" name="permission_to_enter"></small>
                </div>
              </div>


            </div> <!---End row---->

            <div class="form-row">
              <div class="form-group col-sm-12">
                <label class="control-label" for="content">Description:</label>
                <textarea class="form-control show-order-data" name="description" id="description" cols="40" rows="6"></textarea>
                <small class="text-danger" name="description"></small>
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="control-label" for="content">Comments:</label>
              <textarea class="form-control show-order-data" name="comments" id="comments" cols="40" rows="4"></textarea>
              <small class="text-danger" name="comments"></small>
            </div>

            <div class="form-row">

              <div class="col">
                <div class="form-group col-sm-6 submit-button">
                  <label class="control-label " style="display: block" for="">&nbsp&nbsp</label>
                  {{-- <a href="#" class="btn btn-primary pull-right">Submit</a> --}}
                  <button type="button" class="btn btn-primary add pull-left" id="create-order-btn">
                    <span class='glyphicon glyphicon-check'></span> Submit
                  </button>
                  <a href="{{ route('admin') }}" class="btn btn-default" style="margin-left: 5px">Back</a>
                </div>
              </div>
            </div>
            {!! csrf_field() !!}
        </form>
      </div>
    </div>
</div>
@endsection

@section('scripts')
  @include('layouts.datatables_js')
  <script type="text/javascript" src="{{asset('js/work_orders/user_order_ajax.js')}}"></script>

@endsection
