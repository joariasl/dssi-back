<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps  = false;

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

    /**
     * Check if Role has Permission name.
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->permissions()->where('permissions.name', $permission)->count() > 0;
    }
}
