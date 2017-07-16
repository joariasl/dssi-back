<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $timestamps  = false;

    /**
     * Get children Modules.
     */
    public function childModules()
    {
        return $this->hasMany('App\Module', 'parent_module_id')->with('childModules');
    }

    /**
     * Get parent Module.
     */
    public function parentModule()
    {
        return $this->belongsTo('App\Module', 'parent_module_id');
    }

    public function isParent()
    {
        return $this->parent_module_id === null;
    }
}
