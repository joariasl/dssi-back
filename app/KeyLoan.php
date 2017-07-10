<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyLoan extends Model
{
    protected $fillable = ['id', 'key_id', 'delivery_datetime', 'return_datetime', 'delivery_user_id', 'delivery_amphitryon_id', 'return_user_id', 'return_amphitryon_id', 'observations'];

    /**
     * Get the item for Amphitryon.
     */
    public function amphitryonDelivery()
    {
        return $this->belongsTo('App\Amphitryon', 'delivery_amphitryon_id', 'id');
    }

    /**
     * Get the item for Amphitryon.
     */
    public function amphitryonReturn()
    {
        return $this->belongsTo('App\Amphitryon', 'return_amphitryon_id', 'id');
    }

    /**
     * Get the item for Key.
     */
    public function key()
    {
        return $this->belongsTo('App\Key');
    }

}

