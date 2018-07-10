<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
  <label for="startDate">Start Date</label>
  <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
    <input id="startDate" type="text" name="start_date" class="form-control datetimepicker-input" data-target="#datetimepicker1" value="{{date("m-d-Y g:i A", strtotime($event->start_date))}}"/>
    <span class="input-group-addon" data-target="#datetimepicker1" data-toggle="datetimepicker">
      <span class="fa fa-calendar"></span>
    </span>
  </div>
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
  <label for="endDate">End Date</label>
  <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
    <input id="endDate" type="text" name="end_date" class="form-control datetimepicker-input" data-target="#datetimepicker2" value="{{date("m-d-Y g:i A", strtotime($event->end_date))}}"/>
    <span class="input-group-addon" data-target="#datetimepicker2" data-toggle="datetimepicker">
      <span class="fa fa-calendar"></span>
    </span>
  </div>
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
  <label for="fileInput">Image</label>
  <div class="input-group file-button">
      <label class="input-group-btn">
          <span class="btn btn-primary">
              Browse&hellip; <input type="file" name="image" style="display: none;" id="fileInput">
          </span>
      </label>
      
      <input type="text" class="form-control" value="{{ $event->image }}" readonly>
  </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Details Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('details', 'Details:') !!}
    {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
    <input type="hidden" name="creator" value="{{Auth::user()->username}}">
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('events.index') !!}" class="btn btn-default">Cancel</a>
</div>
