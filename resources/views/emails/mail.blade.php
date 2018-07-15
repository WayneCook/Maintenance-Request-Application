<h3>Maintanence Request</h3>
<hr>
<p><strong>Name: </strong> {{ $workorder->name }} </p>
<p><strong>Apartment: </strong> {{ $workorder->unit_number }} </p>
<p><strong>Category: </strong> {{ $workorder->category }} </p>
<p><strong>Description: </strong> {{ $workorder->description }} </p>
<p><strong>Permission to enter: </strong>

  @if ($workorder->permission_to_enter == 1)
    {{ 'Yes' }} </p>
    @else
    {{ 'No' }} </p>
  @endif

  <p><strong>Comments: </strong>
    @if (!isset($workorder->comments))
      {{ 'N/A' }} </p>
      @else
      {{ $workorder->comments }} </p>
    @endif
