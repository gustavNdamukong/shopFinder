<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_image extends Model
{




    public function shop()
    {
        //an image belongs to a shop
        return $this->belongsTo(Shop::class);
    }
}
