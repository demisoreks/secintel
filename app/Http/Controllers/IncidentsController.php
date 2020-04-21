<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use App\SecIncident;

class IncidentsController extends Controller
{
    public function index() {
        $incidents = SecIncident::all();
        return view('incidents.index', compact('incidents'));
    }
    
    public function create() {
        return view('incidents.create');
    }
    
    public function store(Request $request) {
        $input = $request->input();
        $input['title'] = $input['title1'];
        unset($input['title1']);
        $incident = SecIncident::create($input);
        if ($incident) {
            ActivitiesController::log('Incident was created.');
            return Redirect::route('incidents.index')
                    ->with('success', UtilsController::response('Successful!', 'Incident has been created.'));
        } else {
            return Redirect::back()
                    ->with('error', UtilsController::response('Unknown error!', 'Please contact administrator.'))
                    ->withInput();
        }
    }
    
    public function edit(SecIncident $incident) {
        $incident->title1 = $incident->title;
        return view('incidents.edit', compact('incident'));
    }
    
    public function update(SecIncident $incident, Request $request) {
        $input = $request->input();
        $input['title'] = $input['title1'];
        unset($input['title1']);
        if ($incident->update($input)) {
            ActivitiesController::log('Incident was updated.');
            return Redirect::route('incidents.index')
                    ->with('success', UtilsController::response('Successful!', 'Incident has been updated.'));
        } else {
            return Redirect::back()
                    ->with('error', UtilsController::response('Unknown error!', 'Please contact administrator.'))
                    ->withInput();
        }
    }
    
    public function destroy(SecIncident $incident) {
        $incident->delete();
        ActivitiesController::log('Incident was deleted.');
        return Redirect::route('incidents.index')
                ->with('success', UtilsController::response('Successful!', 'Incident has been deleted.'));
    }
    
    public function disable(SecIncident $incident) {
        $input['show'] = false;
        $incident->update($input);
        ActivitiesController::log('Incident was disabled.');
        return Redirect::route('incidents.index')
                ->with('success', UtilsController::response('Successful!', 'Incident has been disabled.'));
    }
    
    public function enable(SecIncident $incident) {
        $input['show'] = true;
        $incident->update($input);
        ActivitiesController::log('Incident type was enabled.');
        return Redirect::route('incidents.index')
                ->with('success', UtilsController::response('Successful!', 'Incident has been enabled.'));
    }
}
