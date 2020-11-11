<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Feed extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feeds';




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url', 'user_id'];





    public $timestamps = false;






    public function user()
    {
        //if a shop belongs to a user
        return $this->belongsTo(User::class);
    }






    public function getPaginated($howMany = 4)
    {
        $collection = [];
        if (isset(Auth::user()->id)) {
            $collection = $shops = Feed::where('user_id', '=', Auth::user()->id)->paginate();
            return $collection;
        }
        return $collection;
    }






}
