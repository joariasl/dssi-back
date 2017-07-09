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

    /**
     * Get the items for ChecklistItem.
     */
    public function checklistItems()
    {
        return $this->hasMany('App\ChecklistItem');
    }

    /**
     * Get the items for ChecklistItemGroups.
     */
    public function checklistItemGroups()
    {
        return $this->hasMany('App\ChecklistItemGroup');
    }
}
