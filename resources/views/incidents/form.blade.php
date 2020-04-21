<div class="form-group row">
    {!! Form::label('state_id', 'State *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::select('state_id', App\SecState::where('active', true)->orderBy('name')->pluck('name', 'id'), $value = null, ['class' => 'form-control select2', 'placeholder' => '- Select Option -', 'required' => true, 'data-live-search' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('incident_type_id', 'Incident Type *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::select('incident_type_id', App\SecIncidentType::where('active', true)->orderBy('description')->pluck('description', 'id'), $value = null, ['class' => 'form-control select2', 'placeholder' => '- Select Option -', 'required' => true, 'data-live-search' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('title1', 'Title *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('title1', $value = null, ['class' => 'form-control', 'placeholder' => 'Title', 'required' => true, 'maxlength' => 300]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('info', 'Info *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::textarea('info', $value = null, ['class' => 'form-control', 'placeholder' => 'Info', 'required' => true, 'maxlength' => 1000, 'rows' => 5]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('incident_date', 'Incident Date *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::date('incident_date', $value = null, ['class' => 'form-control', 'placeholder' => 'Incident Date', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        {!! Form::submit($submit_text, ['class' => 'btn btn-primary']) !!}
    </div>
</div>

<script>
    $('.select2').select2();
</script>