@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/work_order/work_order_content.css')}}">
  
@endsection

@section('content')
  <section class="content-header">
    <nav>
        <ol class="breadcrumb breadcrumb-arrow">

        <li><a href="#">Admin</a></li>
        <li class="active"><span>Work Orders</span></li>
      </ol>
    </nav>

  </section>
   <div class="content">
     <div class="panel panel-default">
       <div class="panel-heading"><h4 style="display: inline-block">Edit User info</h4></div>
       <div class="panel-body">


       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                        @include('users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
         </div>
       </div>
     </div>
       </div>

   </div>
@endsection
