<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \App\Models\Feed;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //here we get all the existing shops to display on the home page
        $feed = new Feed();

        // but first convert the collection into an array
        //$shops = $shop::all()->toArray(); //decided to keep this as an obj so i could use LV's paginator, wh only works with objects
        $feeds = $feed->getPaginated();

        return view('feed')->with('feeds', $feeds);
    }




    /**
     * Show the page with details of a specific store.
     *
     */
    public function showFeedPage($id)
    {
        $feeds = new Feed;

        //$shopImages = [];


        $feed = $feeds::where('feeds.id', $id)
            ->select('feeds.url')->get();

        return view('feed_details')->with(['feed' => $feed]);
    }





    /*
     * Method to handle the Ajax request to navigate the user to the nearest shop
     *
     */
    public function getNearest(Request $request)
    {
        // Getting all post data
        $lat = $request->lat;
        $long = $request->long;

        // Build the spherical geometry SQL string
        $earthRadius = '3963.0'; // In miles

        $shops = new Shop();

        $results = $shops->closest($lat, $long, $earthRadius);


        return $results;
    }
}
