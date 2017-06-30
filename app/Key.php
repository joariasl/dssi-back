<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = ['id', 'property_id', 'code'];

    /**
     * Get the item for KeyLoan.
     */
    public function keyLoan()
    {
        return $this->hasMany('App\KeyLoan');
    }
}
