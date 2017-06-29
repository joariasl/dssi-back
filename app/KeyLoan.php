<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyLoan extends Model
{
    protected $fillable = ['id', 'key_id', 'date', 'delivery_rut', 'return_rut', 'return_condition', 'observations'];

    /**
     * Get the item for Person.
     */
    public function personDelivery()
    {
        return $this->belongsTo('App\Person', 'delivery_rut', 'rut');
    }

    /**
     * Get the item for Person.
     */
    public function personReturn()
    {
        return $this->belongsTo('App\Person', 'return_rut', 'rut');
    }

    /**
     * Get the item for Key.
     */
    public function key()
    {
        return $this->belongsTo('App\Key');
    }

}

