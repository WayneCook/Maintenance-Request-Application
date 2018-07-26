<h2>New Message</h2>
<hr>

@foreach ($inputs as $key => $value)
@if (isset($value))
  <p><strong>{{ ucfirst($key) }}: </strong> {{ $value }} </p>
@else
  <p><strong>{{ ucfirst($key) }}:  </strong>NN/A</p>
@endif
@endforeach
