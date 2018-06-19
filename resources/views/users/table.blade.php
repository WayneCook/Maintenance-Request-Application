
<table class="display nowrap table table-striped table-hover" id="users-table" style="width: 100%">
    <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Unit</th>
          <th>Role</th>
          <th>Registered on</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
          <td>{!! $user->username !!}</td>
          <td>{!! $user->email !!}</td>
          <td>{!! $user->unit_number !!}</td>

            @switch($user->role_id)
                @case(1)
                    <td>Admin</td>
                    @break

                @case(2)
                    <td>Maintanence</td>
                    @break

                @default
                    <td>Basic</td>
            @endswitch

          <td>{!! $user->created_at !!}</td>
          <td>
              {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}

                  <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-eye-open"></i></a>
                  <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}

              {!! Form::close() !!}
          </td>
        </tr>
    @endforeach
    </tbody>
</table>
