<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SecActivity;

class ActivitiesController extends Controller
{
    public static function log($detail) {
        if (!isset($_SESSION)) session_start();
        $halo_user = $_SESSION['halo_user'];
        SecActivity::create([
            'employee_id' => $halo_user->id,
            'detail' => $detail,
            'source_ip' => $_SERVER['REMOTE_ADDR']
        ]);
    }
}
