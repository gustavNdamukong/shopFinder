<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FeedsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the manage feeds page to the admin user.
     *
     * @return Response
     */
    public function index()
    {
        //here we get all the existing feeds to display on the admin home page when an admin person is logged in
        //However, only super-admin users are allowed to edit/delete all feeds regardless of the creator, but admin users are allowed to edit/delete feeds
        //created by them. We therefore need to check what type of admin this user is and if they're an admin we'll grab and show them only their feeds
        $feed = new Feed();

        if (Auth::user()->hasRole('super-admin'))
        {
            // but first convert the collection into an array
            //$feeds = $shop::all()->toArray(); //decided to keep this as an obj so i could use LV's paginator, wh only works with objects
            $feeds = $feed->getPaginated();
        }
        else
        {
            $feeds = $feed::where('user_id', '=', Auth::user()->id)->paginate();
        }

        return view('admin.feeds.admin_feeds')->with('feeds', $feeds);
    }






    public function create()
    {
        return view('admin.feeds.create_feed');
    }




    public function saveFeed(Request $request)
    {
        $request->validate([
            'url' => 'required',
        ]);

        //validation was successful

        //save the shop to DB and get its ID
        $feed = new Feed;

        $feed->url = $request->url;
        $feed->user_id = $request->user_id;

        $saved = $feed->save();

        if ($saved) {
            $feed_id = $feed->id;

            //done
            flash("The feed {$request->url} was saved successfully")->success();

            return redirect('admin/feeds');
        }
    }












    public function destroy(Feed $feed)
    {
        //delete the shop
        $feed->delete();

        flash('The feed was deleted successfully')->success();
        return redirect('admin/feeds');
    }


}
