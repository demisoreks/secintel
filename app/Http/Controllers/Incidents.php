<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\SecIncident;
use App\SecState;
use App\SecIncidentType;

class Incidents extends Controller
{
    public function getByState($state_id) {
        $incidents = SecIncident::where('show', true)->where('state_id', $state_id)->where('incident_date', '>=', DB::raw('DATE(NOW()) - INTERVAL 7 DAY'))->orderBy('incident_date')->get();
        foreach ($incidents as $incident) {
            $incident->state = SecState::find($state_id)->name;
            $incident->type = SecIncidentType::find($incident->incident_type_id)->description;
        }
        return $incidents;
    }
}
