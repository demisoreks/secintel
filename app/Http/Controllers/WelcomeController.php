<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\SecIncident;
use App\SecIncidentType;
use App\Charts\StatisticsChart;

class WelcomeController extends Controller
{
    public function index() {
        $from = date('Y-m-d', strtotime('-13 days'));
        $to = date('Y-m-d');
        $incidents = json_decode(json_encode(SecIncident::where('show', true)->whereBetween('incident_date', [$from, $to])->orderBy('incident_date')->get()));
        
        $date_chart = new StatisticsChart();
        $type_chart = new StatisticsChart();
        $date_array = [];
        $type_array = [];
        foreach ($incidents as $incident) {
            $i = (array) $incident;
            if (array_key_exists('incident_type_id', $i)) {
                $type_array[SecIncidentType::find($i['incident_type_id'])->description][] = $i;
            } else {
                $type_array[''][] = $i;
            }
            if (array_key_exists('incident_date', $i)) {
                $date_array[$i['incident_date']][] = $i;
            } else {
                $date_array[''][] = $i;
            }
        }
        $date_labels = [];
        $date_count = [];
        foreach ($date_array as $key => $value) {
            $date_labels[] = $key;
            $date_count[] = count($value);
        }
        $date_chart->labels($date_labels);
        $date_chart->dataset('No. of Incidents', 'bar', $date_count);
        $date_chart->title('Incident Statistics By Date');
        $type_labels = [];
        $type_count = [];
        $type_color = [];
        foreach ($type_array as $key => $value) {
            $type_labels[] = $key;
            $type_count[] = count($value);
            $type_color[] = '#'.str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        $type_chart->labels($type_labels);
        $type_chart->dataset('No. of Incidents', 'doughnut', $type_count)->backgroundColor($type_color);
        $type_chart->title('Incident Statistics By Type');
        
        return view('index', compact('date_chart', 'type_chart'));
    }
    
    static function checkAccess() {
        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['halo_user'])) {
            return true;
        } else {
            return false;
        }
    }
}
