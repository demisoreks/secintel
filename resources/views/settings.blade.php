@extends('app', ['page_title' => 'Settings', 'open_menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12">
        <legend>Edit Settings</legend>
        {!! Form::model($settings, ['route' => ['settings.update'], 'class' => 'form-group']) !!}
        @method('PUT')
            <div class="form-group row">
                {!! Form::label('covid_image_link', 'COVID-19 Update Image', ['class' => 'col-md-2 col-form-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('covid_image_link', $value = null, ['class' => 'form-control', 'placeholder' => 'COVID-19 Image Link', 'maxlength' => 500]) !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10 offset-md-2">
                    {!! Form::submit('Update Settings', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection