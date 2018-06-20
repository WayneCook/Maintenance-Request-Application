
<!-- Name Field -->
<div class="form-group col-4">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->username !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-4">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-4">
    {!! Form::label('created_at', 'Registered on:') !!}
    <p>{!! $user->created_at->format('M d Y') !!}</p>
</div>
