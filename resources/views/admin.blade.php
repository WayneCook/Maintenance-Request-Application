@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">


      <h3 style="text-align: center">Welcome {{Auth::user()->name}}!</h3>
    </div>
</div>
@endsection
