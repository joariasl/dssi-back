<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyCondition extends Model
{
    protected $fillable = ['id', 'name'];

    /**
     * Get the item for Keys.
     */
    public function keys()
    {
        return $this->hasMany('App\Key', 'id', 'condition_id');
    }
}
