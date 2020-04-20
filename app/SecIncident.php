<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class SecIncident extends Model
{
    use HasHashSlug;
    
    protected $table = "sec_incidents";
    
    protected $guarded = [];
    
    public function state() {
        return $this->belongsTo('App\SecState');
    }
    
    public function incidentType() {
        return $this->belongsTo('App\SecIncidentType');
    }
}
