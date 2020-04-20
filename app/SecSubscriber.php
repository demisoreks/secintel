<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class SecSubscriber extends Model
{
    use HasHashSlug;
    
    protected $table = "sec_subscribers";
    
    protected $guarded = [];
}
