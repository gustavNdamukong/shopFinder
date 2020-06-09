<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Shop extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shops';




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'city', 'location', 'postcode', 'lat', 'lon', 'address', 'description', 'user_id'];





    public $timestamps = false;




    public function closest($lat, $long, $earthRadius)
    {
        // HERE'S HOW U RUN A DB RAW SQL QUERY WITH FLUENT QUERY BUILDER-IT RETURNS AN STD OBJECT
        // JUST ENSURE YOU'RE USING THE ILLUMINATE DB CLASS... use Illuminate\Support\Facades\DB;
        $results = DB::select( DB::raw("SELECT
                    ROUND(
                        $earthRadius * ACOS(  
                            SIN( $lat*PI()/180 ) * SIN( lat*PI()/180 )
                            + COS( $lat*PI()/180 ) * COS( lat*PI()/180 )  *  COS( (lon*PI()/180) - ($long*PI()/180) )   ) 
                    , 1)
                    AS distance,
                    name,
                    lat,
                    lon,       
                    address
                FROM
                    shops
                ORDER BY
                    distance ASC 
                LIMIT 1")); /////LIMIT 0, 10") );


        //convert the std obj into an array, coz we need only the address bit to send back to JS
        $results = json_decode(json_encode($results), True);


        /*
        $results = DB::table('restaurants')
        ->select(DB::raw("ROUND($earthRadius * ACOS(
                SIN( $lat*PI()/180 ) * SIN( lat*PI()/180 )
                + COS( $lat*PI()/180 ) * COS( lat*PI()/180 )  *  COS( (lon*PI()/180) - ($long*PI()/180) ))
        , 1)
        AS distance,
        name,
        lat,
        lon,
        address"))
         ->orderBy('distance','asc')
         ->take(1)
         ->get(); ///////// THIS WORKS TOO, IT'S ANOTHER WAY TO MAKE A DB RAW QUERY
        *
        */



        /////$results = json_encode(json_decode($results));
        //die($results[0]['address']);

        return $results[0]['address'];

    }




    public function user()
    {
        //if a shop belongs to a user
        return $this->belongsTo(User::class);
    }




    public function shop_image()
    {
        //A shop can have many images
        /////return $this->hasMany(Shop_image::class);
        return $this->hasMany('App\Models\Shop_image', 'shop_id');
    }




    public function getPaginated($howMany = 2)
    {
        $collection = Shop::paginate($howMany);//->toArray(); let's try getting an obj coz the LV paginator doesn't seem to work with arrays

        return $collection;
    }






}
