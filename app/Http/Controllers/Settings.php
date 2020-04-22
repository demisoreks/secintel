<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SecSetting;

class Settings extends Controller
{
    public function get() {
        return SecSetting::find(1);
    }
}
