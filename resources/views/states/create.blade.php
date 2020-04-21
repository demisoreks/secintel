@extends('app', ['page_title' => 'Incidents', 'open_menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-primary" href="{{ route('incidents.index') }}"><i class="fas fa-list"></i> Existing Incidents</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Incident</legend>
        {!! Form::model(new App\SecIncident, ['route' => ['incidents.store'], 'class' => 'form-group']) !!}
            @include('incidents/form', ['submit_text' => 'Create Incident'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
