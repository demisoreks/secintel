<div class="form-group row">
    {!! Form::label('title1', 'Title *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('title1', $value = null, ['class' => 'form-control', 'placeholder' => 'Title', 'required' => true, 'maxlength' => 500]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('link', 'Link *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('link', $value = null, ['class' => 'form-control', 'placeholder' => 'Info', 'required' => true, 'maxlength' => 500]) !!}
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