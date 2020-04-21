<div class="form-group row">
    {!! Form::label('name', 'Name *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true, 'maxlength' => 100, 'readonly' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('lockdown_status', 'Lockdown Status *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::select('lockdown_status', ['None' => 'None', 'Partial' => 'Partial', 'Total' => 'Total'], $value = null, ['class' => 'form-control', 'placeholder' => '- Select Option -', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('lockdown_end', 'Lockdown End', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::date('lockdown_end', $value = null, ['class' => 'form-control', 'placeholder' => 'Lockdown End']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('lockdown_policy', 'Lockdown Policy URL', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('lockdown_policy', $value = null, ['class' => 'form-control', 'placeholder' => 'Lockdown Policy URL', 'maxlength' => 500]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('risk_rating', 'Risk Rating *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::select('risk_rating', ['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], $value = null, ['class' => 'form-control', 'placeholder' => '- Select Option -', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('emergency', 'Emergency Numbers *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('emergency', $value = null, ['class' => 'form-control', 'placeholder' => 'Emergency Numbers', 'required' => true, 'maxlength' => 50]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('info', 'Info *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('info', $value = null, ['class' => 'form-control', 'placeholder' => 'Info', 'required' => true, 'maxlength' => 1000, 'rows' => 7]) !!}
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