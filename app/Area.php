<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['id', 'name'];

    /**
     * Get the item for Amphitryons.
     */
    public function amphitryons()
    {
        return $this->hasMany('App\Amphitryon', 'id', 'area_id');
    }
}
