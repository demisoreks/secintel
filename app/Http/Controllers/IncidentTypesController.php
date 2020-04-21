<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use App\SecIncidentType;

class IncidentTypesController extends Controller
{
    public function index() {
        $incident_types = SecIncidentType::all();
        return view('incident_types.index', compact('incident_types'));
    }
    
    public function create() {
        return view('incident_types.create');
    }
    
    public function store(Request $request) {
        $input = $request->input();
        $error = "";
        $existing_incident_types = SecIncidentType::where('description', $input['description']);
        if ($existing_incident_types->count() != 0) {
            $error .= "Incident type already exists.<br />";
        }
        if ($error != "") {
            return Redirect::back()
                    ->with('error', UtilsController::response('Oops!', $error))
                    ->withInput();
        } else {
            $incident_type = SecIncidentType::create($input);
            if ($incident_type) {
                ActivitiesController::log('Incident type was created - '.$incident_type->description.'.');
                return Redirect::route('incident_types.index')
                        ->with('success', UtilsController::response('Successful!', 'Incident type has been created.'));
            } else {
                return Redirect::back()
                        ->with('error', UtilsController::response('Unknown error!', 'Please contact administrator.'))
                        ->withInput();
            }
        }
    }
    
    public function edit(SecIncidentType $incident_type) {
        return view('incident_types.edit', compact('incident_type'));
    }
    
    public function update(SecIncidentType $incident_type, Request $request) {
        $input = $request->input();
        $error = "";
        $existing_incident_types = SecIncidentType::where('description', $input['description'])->where('id', '<>', $incident_type->id);
        if ($existing_incident_types->count() != 0) {
            $error .= "Incident type name already exists.<br />";
        }
        if ($error != "") {
            return Redirect::back()
                    ->with('error', UtilsController::response('Oops!', $error))
                    ->withInput();
        } else {
            if ($incident_type->update($input)) {
                ActivitiesController::log('Incident type was updated - '.$incident_type->description.'.');
                return Redirect::route('incident_types.index')
                        ->with('success', UtilsController::response('Successful!', 'Incident type has been updated.'));
            } else {
                return Redirect::back()
                        ->with('error', UtilsController::response('Unknown error!', 'Please contact administrator.'))
                        ->withInput();
            }
        }
    }
    
    public function disable(SecIncidentType $incident_type) {
        $input['active'] = false;
        $incident_type->update($input);
        ActivitiesController::log('Incident type was disabled - '.$incident_type->description.'.');
        return Redirect::route('incident_types.index')
                ->with('success', UtilsController::response('Successful!', 'Incident type has been disabled.'));
    }
    
    public function enable(SecIncidentType $incident_type) {
        $input['active'] = true;
        $incident_type->update($input);
        ActivitiesController::log('Incident type was enabled - '.$incident_type->description.'.');
        return Redirect::route('incident_types.index')
                ->with('success', UtilsController::response('Successful!', 'Incident type has been enabled.'));
    }
}
