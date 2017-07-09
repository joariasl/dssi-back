<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = ['id', 'condition_id', 'property_id', 'code'];

    /**
     * Get the item for KeyLoans.
     */
    public function keyLoans()
    {
        return $this->hasMany('App\KeyLoan');
    }

    /**
     * Get the item for KeyCondition.
     */
    public function keyCondition()
    {
        return $this->hasOne('App\KeyCondition', 'id', 'condition_id');
    }
}
