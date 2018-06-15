<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Resident Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_number', 'Apartment Number:') !!}
    {!! Form::text('unit_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'size' => '10x5']) !!}
</div>

<!-- Comments Field -->
<div class="form-group col-sm-6">
  {!! Form::label('comments', 'Comments:') !!}
  {!! Form::textarea('comments', null, ['class' => 'form-control', 'size' => '10x5']) !!}
</div>

<!-- Permission To Enter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permission to enter', 'Permission to enter?:') !!}
    {!! Form::select('permission_to_enter', [1 => 'Yes', 0 => 'No'], null, ['class' => 'form-control']) !!}
  </label>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('order_status', 'Order Status:') !!}
    {!! Form::select('order_status', [1 => 'Open', 0 => 'Closed'], null, ['class' => 'form-control']) !!}
  </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Send work order', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('workOrders.index') !!}" class="btn btn-default">Cancel</a>
</div>
