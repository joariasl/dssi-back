<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * Get children Modules.
     */
    public function childModules()
    {
        return $this->hasMany('App\Module')->with('childModules');
    }

    /**
     * Get parent Module.
     */
    public function parentModule()
    {
        return $this->belongsTo('App\Module');
    }
}
