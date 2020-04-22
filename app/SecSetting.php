<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class SecSetting extends Model
{
    use HasHashSlug;
    
    protected $table = "sec_settings";
    
    protected $guarded = [];
}
