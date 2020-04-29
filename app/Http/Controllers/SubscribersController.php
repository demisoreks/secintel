<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use App\SecSubscriber;

class SubscribersController extends Controller
{
    public function index() {
        $subscribers = SecSubscriber::all();
        return view('subscribers.index', compact('subscribers'));
    }
    
    public function disable(SecSubscriber $subscriber) {
        $input['active'] = false;
        $subscriber->update($input);
        ActivitiesController::log('Subscriber was disabled - '.$subscriber->email);
        return Redirect::route('subscribers.index')
                ->with('success', UtilsController::response('Successful!', 'Subscriber has been disabled.'));
    }
    
    public function enable(SecSubscriber $subscriber) {
        $input['active'] = true;
        $subscriber->update($input);
        ActivitiesController::log('Subscriber was enabled - '.$subscriber->email);
        return Redirect::route('subscribers.index')
                ->with('success', UtilsController::response('Successful!', 'Subscriber has been enabled.'));
    }
}
