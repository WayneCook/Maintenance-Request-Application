
<!-- Name Field -->
<div class="form-group custom-section">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->username !!}</p>
</div>

<!-- Unit Number Field -->
<div class="form-group custom-section">
    {!! Form::label('unit_number', 'Unit Number:') !!}
    <p>{!! $user->unit_number !!}</p>
</div>

<!-- Email Field -->
<div class="form-group custom-section">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group custom-section">
    {!! Form::label('created_at', 'Registered on:') !!}
    <p>{!! $user->created_at->format('M d Y') !!}</p>
</div>

<!-- Role Field -->
<div class="form-group custom-section">
    {!! Form::label('role_id', 'Role:') !!}

    @if ($user->role_id == 1)
      <p>Admin</p>
    @elseif ($user->role_id == 2)
      <p>Maintanence</p>
      @else
        <p>Resident</p>
    @endif
</div>
