<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps  = false;

    /**
     * Get the items for Roles.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Get the items for Users.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
