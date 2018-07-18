<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $workOrder->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $workOrder->name !!}</p>
</div>

<!-- Unit Number Field -->
<div class="form-group">
    {!! Form::label('unit_number', 'Unit Number:') !!}
    <p>{!! $workOrder->unit_number !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $workOrder->description !!}</p>
</div>

<!-- Permission To Enter Field -->
<div class="form-group">
    {!! Form::label('permission_to_enter', 'Permission To Enter:') !!}
    <p>{!! $workOrder->permission_to_enter !!}</p>
</div>

<!-- priority Field -->
<div class="form-group">
    {!! Form::label('priority', 'Priority:') !!}
    <p>{!! $workOrder->priority !!}</p>
</div>

<!-- Comments Field -->
<div class="form-group">
    {!! Form::label('comments', 'Comments:') !!}
    <p>{!! $workOrder->comments !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $workOrder->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $workOrder->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $workOrder->deleted_at !!}</p>
</div>
