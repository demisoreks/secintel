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
        $from = date('Y-m-d', strtotime('-6 days'));
        $to = date('Y-m-d');
        $incidents = SecIncident::where('show', true)->where('state_id', $state_id)->whereBetween('incident_date', [$from, $to])->orderBy('incident_date')->get();
        foreach ($incidents as $incident) {
            $incident->state = SecState::find($state_id)->name;
            $incident->type = SecIncidentType::find($incident->incident_type_id)->description;
        }
        return $incidents;
    }
}
