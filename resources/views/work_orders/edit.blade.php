@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Work Order
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($workOrder, ['route' => ['workOrders.update', $workOrder->id], 'method' => 'patch']) !!}

                        @include('work_orders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection