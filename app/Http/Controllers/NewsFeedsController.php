<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use App\SecNewsFeed;

class NewsFeedsController extends Controller
{
    public function index() {
        $news_feeds = SecNewsFeed::all();
        return view('news_feeds.index', compact('news_feeds'));
    }
    
    public function create() {
        return view('news_feeds.create');
    }
    
    public function store(Request $request) {
        $input = $request->input();
        $input['title'] = $input['title1'];
        unset($input['title1']);
        $news_feed = SecNewsFeed::create($input);
        if ($news_feed) {
            ActivitiesController::log('News feed was created.');
            return Redirect::route('news_feeds.index')
                    ->with('success', UtilsController::response('Successful!', 'News feed has been created.'));
        } else {
            return Redirect::back()
                    ->with('error', UtilsController::response('Unknown error!', 'Please contact administrator.'))
                    ->withInput();
        }
    }
    
    public function edit(SecNewsFeed $news_feed) {
        $news_feed->title1 = $news_feed->title;
        return view('news_feeds.edit', compact('news_feed'));
    }
    
    public function update(SecNewsFeed $news_feed, Request $request) {
        $input = $request->input();
        $input['title'] = $input['title1'];
        unset($input['title1']);
        if ($news_feed->update($input)) {
            ActivitiesController::log('News feed was updated.');
            return Redirect::route('news_feeds.index')
                    ->with('success', UtilsController::response('Successful!', 'News feed has been updated.'));
        } else {
            return Redirect::back()
                    ->with('error', UtilsController::response('Unknown error!', 'Please contact administrator.'))
                    ->withInput();
        }
    }
    
    public function destroy(SecNewsFeed $news_feed) {
        $news_feed->delete();
        ActivitiesController::log('News feed was deleted.');
        return Redirect::route('news_feeds.index')
                ->with('success', UtilsController::response('Successful!', 'News feed has been deleted.'));
    }
    
    public function disable(SecNewsFeed $news_feed) {
        $input['show'] = false;
        $news_feed->update($input);
        ActivitiesController::log('News feed was disabled.');
        return Redirect::route('news_feeds.index')
                ->with('success', UtilsController::response('Successful!', 'News feed has been disabled.'));
    }
    
    public function enable(SecNewsFeed $news_feed) {
        $input['show'] = true;
        $news_feed->update($input);
        ActivitiesController::log('News feed was enabled.');
        return Redirect::route('news_feeds.index')
                ->with('success', UtilsController::response('Successful!', 'News feed has been enabled.'));
    }
}
