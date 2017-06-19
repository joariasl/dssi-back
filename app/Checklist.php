<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['id', 'property_id'];

    /**
     * Get the items for ChecklistRegistry.
     */
    public function checklistRegistries()
    {
        return $this->hasMany('App\ChecklistRegistry');
    }
}
