<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the items for Roles.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    /**
     * Get the items for Users.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
