<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SecNewsFeed;

class NewsFeeds extends Controller
{
    public function index() {
        return SecNewsFeed::where('show', true)->orderBy('id', 'desc')->get();
    }
}
