<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistItemGroup extends Model
{
    protected $fillable = ['id', 'name', 'checklist_id'];

    /**
     * Get the item for Checklist.
     */
    public function checklist()
    {
        return $this->belongsTo('App\Checklist');
    }

    /**
     * Get the items for ChecklistItems.
     */
    public function checklistItems()
    {
        return $this->hasMany('App\ChecklistItem');
    }
}
