<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SecState;

class States extends Controller
{
    public function index() {
        return SecState::where('active', true)->get();
    }
    
    public function show($id) {
        return SecState::find($id);
    }
}
