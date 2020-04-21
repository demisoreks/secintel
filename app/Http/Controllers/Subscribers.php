<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SecSubscriber;

class Subscribers extends Controller
{
    public function store(Request $request) {
        $subscribers = SecSubscriber::where('email', $request->email);
        if ($subscribers->count() == 0) {
            $subscriber = SecSubscriber::create([
                'name' => $request->name,
                'email' => $request->email
            ]);
            if ($subscriber) {
                $response['code'] = '00';
                $response['message'] = 'Success';
            } else {
                $response['code'] = '01';
                $response['message'] = 'Error';
            }
        } else {
            $response['code'] = '00';
            $response['message'] = 'Success';
        }
        return ['response' => $response];
    }
}
