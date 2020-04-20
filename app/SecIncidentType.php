<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class SecIncidentType extends Model
{
    use HasHashSlug;
    
    protected $table = "sec_incident_types";
    
    protected $guarded = [];
    
    public function incidents() {
        return $this->hasMany('App\SecIncident');
    }
}
