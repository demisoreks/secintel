<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use App\SecState;

class StatesController extends Controller
{
    public function index() {
        $states = SecState::all();
        return view('states.index', compact('states'));
    }
    
    public function edit(SecState $state) {
        return view('states.edit', compact('state'));
    }
    
    public function update(SecState $state, Request $request) {
        $input = $request->input();
        if ($state->update($input)) {
            ActivitiesController::log('State was updated.');
            return Redirect::route('states.index')
                    ->with('success', UtilsController::response('Successful!', 'State has been updated.'));
        } else {
            return Redirect::back()
                    ->with('error', UtilsController::response('Unknown error!', 'Please contact administrator.'))
                    ->withInput();
        }
    }
}
