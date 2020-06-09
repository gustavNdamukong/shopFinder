<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    public function shop()
    {
        //if a user can have many shops
        return $this->hasMany(Shop::class);
    }



    /*
     * The other model that you want to link to
     * The name of the table that joins these records
     * The name of the field in the joining table that references the current model
     * The name of the field in the joining tables that references the foreign model
     *
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_to_user', 'user_id', 'role_id');
    }




    /*
     * Check if the roles of the currently logged-in user matches any in the $roles array
     */
    public function hasAnyRoles($roles)
    {
        if ($this->roles()->whereIn('name', $roles)->first())
        {
            return true;
        }
        else
        {
            return false;
        }
    }





    /*
     * Check if the currently logged-in user has a given role $role
     */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first())
        {
            return true;
        }
        else
        {
            return false;
        }
    }



    public function getRoles()
    {
        $roles = DB::select(DB::raw("SELECT r.name
            FROM users u
            LEFT JOIN role_to_user r2u
            ON u.id = r2u.user_id
            LEFT JOIN roles r
            ON r2u.role_id = r.id
            WHERE u.id = $this->id"));

        $array = json_decode(json_encode($roles[0]), true);

        return $array;
    }
}
