<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Name:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_number', 'Unit Number:') !!}
    {!! Form::text('unit_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Role -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'User Role:') !!}
    {!! Form::select('role_id', array('3' => 'Basic', '2' => 'Maintanence', '1' => 'Admin'), null, ['class' => 'form-control']) !!}
    {{-- {!! Form::text('role_id', null, ['class' => 'form-control']) !!} --}}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
