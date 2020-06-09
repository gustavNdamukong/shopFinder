<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /*
     * The other model that you want to link to
     * The name of the table that joins these records
     * The name of the field in the joining table that references the current model
     * The name of the field in the joining tables that references the foreign model
     *
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'role_to_user', 'role_id', 'user_id');
    }

}
