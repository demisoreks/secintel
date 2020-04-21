@extends('app', ['page_title' => 'Incidents', 'open_menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-primary" href="{{ route('incidents.create') }}"><i class="fas fa-plus"></i> New Incident</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div id="accordion1">
            <div class="card">
                <div class="card-header bg-white text-primary" id="heading3" style="padding: 0;">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                            <strong>Active</strong>
                        </button>
                    </h5>
                </div>
                <div id="collapse3" class="collapse show" aria-labelledby="heading3" data-parent="#accordion1">
                    <div class="card-body">
                        <table id="myTable3" class="display-1 table table-condensed table-hover table-striped responsive" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="10%"><strong>DATE</strong></th>
                                    <th width="10%"><strong>STATE</strong></th>
                                    <th width="10%"><strong>INCIDENT TYPE</strong></th>
                                    <th width="20%"><strong>TITLE</strong></th>
                                    <th><strong>INFO</strong></th>
                                    <th width="12%" data-priority="1">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incidents as $incident)
                                    @if ($incident->show)
                                <tr>
                                    <td>{{ $incident->incident_date }}</td>
                                    <td>{{ $incident->state->name }}</td>
                                    <td>{{ $incident->incidentType->description }}</td>
                                    <td>{{ $incident->title }}</td>
                                    <td>{{ $incident->info }}</td>
                                    <td class="text-center">
                                        <a title="Edit" href="{{ route('incidents.edit', [$incident->slug()]) }}"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                        <a title="Trash" href="{{ route('incidents.disable', [$incident->slug()]) }}" onclick="return confirmDisable()"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;
                                        <a title="Delete" href="{{ route('incidents.delete', [$incident->slug()]) }}" onclick="return confirmDelete()"><i class="fas fa-times text-danger"></i></a>
                                    </td>
                                </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
            <div class="card">
                <div class="card-header bg-white text-primary" id="heading4" style="padding: 0;">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                            <strong>Inactive</strong>
                        </button>
                    </h5>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion1">
                    <div class="card-body">
                        <table id="myTable2" class="display-1 table table-condensed table-hover table-striped responsive" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="10%"><strong>DATE</strong></th>
                                    <th width="10%"><strong>STATE</strong></th>
                                    <th width="10%"><strong>INCIDENT TYPE</strong></th>
                                    <th width="20%"><strong>TITLE</strong></th>
                                    <th><strong>INFO</strong></th>
                                    <th width="12%" data-priority="1">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incidents as $incident)
                                    @if (!$incident->show)
                                <tr>
                                    <td>{{ $incident->incident_date }}</td>
                                    <td>{{ $incident->state->name }}</td>
                                    <td>{{ $incident->incidentType->description }}</td>
                                    <td>{{ $incident->title }}</td>
                                    <td>{{ $incident->info }}</td>
                                    <td class="text-center">
                                        <a title="Restore" href="{{ route('incidents.enable', [$incident->slug()]) }}"><i class="fas fa-undo"></i></a>&nbsp;&nbsp;
                                        <a title="Delete" href="{{ route('incidents.delete', [$incident->slug()]) }}" onclick="return confirmDelete()"><i class="fas fa-times text-danger"></i></a>
                                    </td>
                                </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection