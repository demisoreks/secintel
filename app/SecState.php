<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class SecState extends Model
{
    use HasHashSlug;
    
    protected $table = "sec_states";
    
    protected $guarded = [];
    
    public function incidents() {
        return $this->hasMany('App\SecIncident');
    }
}
