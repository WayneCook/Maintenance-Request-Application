<table class="display nowrap table table-striped table-hover" id="events-table" style="width: 100%">
    <thead>
        <tr>
          <th>Title</th>
          <th>Sign ups</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <td>{!! $event->title !!}</td>
            <td>{!! $event->signups !!}</td>
            <td>{!! date("m/d/y g:i A", strtotime($event->start_date)) !!}</td>
            <td>{!! date("m/d/y g:i A", strtotime($event->end_date)) !!}</td>
            <td>
                {!! Form::open(['route' => ['events.destroy', $event->id], 'method' => 'delete','class' => 'delete-event']) !!}

                    <a data-toggle="tooltip" title="View" data-placement="top" href="{!! route('events.show', [$event->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a data-toggle="tooltip" title="Edit" data-placement="top" href="{!! route('events.edit', [$event->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-toggle' => 'tooltip', 'title' => 'Delete', 'data-placement' => 'top']) !!}

                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
