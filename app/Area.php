<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['id', 'name'];

    /**
     * Get the item for Amphitryon.
     */
    public function amphitryon()
    {
        return $this->hasOne('App\Amphitryon', 'id', 'area_id');
    }
}
