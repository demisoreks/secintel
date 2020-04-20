<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class SecActivity extends Model
{
    use HasHashSlug;
    
    protected $table = "sec_activities";
    
    protected $guarded = [];
}
