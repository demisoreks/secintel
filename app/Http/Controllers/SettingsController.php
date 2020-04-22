<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use App\SecSetting;

class SettingsController extends Controller
{
    public function index() {
        $settings = SecSetting::whereId(1)->first();
        return view('settings', compact('settings'));
    }
    
    public function update(Request $request) {
        $input = $request->all();
        $settings = SecSetting::whereId(1)->first();
        if ($settings->update($input)) {
            ActivitiesController::log('Settings page was updated.');
            return Redirect::route('settings')
                    ->with('success', UtilsController::response('Successful!', 'Settings have been updated.'));
        } else {
            return Redirect::back()
                    ->with('error', UtilsController::response('Unknown error!', 'Please contact administrator.'))
                    ->withInput();
        }
    }
}
