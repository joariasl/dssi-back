<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyCondition extends Model
{
    protected $fillable = ['id', 'name'];

    /**
     * Get the item for Key.
     */
    public function key()
    {
        return $this->belongsTo('App\Key', 'condition_id', 'id');
    }
}
