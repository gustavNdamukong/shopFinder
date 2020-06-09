<?php

namespace App\Http\Controllers;

use App\Models\Shop_image;
use Illuminate\Http\Request;
use \App\Models\Shop;

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
        $shop = new Shop();

        // but first convert the collection into an array
        //$shops = $shop::all()->toArray(); //decided to keep this as an obj so i could use LV's paginator, wh only works with objects
        $shops = $shop->getPaginated();

        return view('shop')->with('shops', $shops);
    }




    /**
     * Show the page with details of a specific store.
     *
     */
    public function showStorePage($id)
    {
        $shops = new Shop;

        $shopImages = [];

        //Do an eloquent left join on the Shop and Shop_image models to get the many images associated with any given shop
        $shopAndImages = $shops::where('shops.id', $id)
            ->leftJoin('shop_images', 'shops.id', '=', 'shop_images.shop_id')
            ->select('shops.name','shops.city','shops.postcode','shops.address','shops.description','shop_images.image_name')->get();

        //first of all check that the image array of the first element is not empty as that will still be passed thru as having content even if it's empty, and that
        //will mess up the count when displaying the image thumbnails
        if (!empty($shopAndImages[0]->image_name)) {
            foreach ($shopAndImages as $img) {
                array_push($shopImages, $img->image_name);
            }
        }

        return view('shop_details')->with(['shop' => $shopAndImages, 'shopImages' => $shopImages]);
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
