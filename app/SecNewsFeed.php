<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class SecNewsFeed extends Model
{
    use HasHashSlug;
    
    protected $table = "sec_news_feeds";
    
    protected $guarded = [];
}
