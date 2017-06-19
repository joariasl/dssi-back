<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistItemGroup extends Model
{
    protected $fillable = ['id', 'name'];

    /**
     * Get the items for ChecklistItems.
     */
    public function checklistItems()
    {
        return $this->hasMany('App\ChecklistItem');
    }
}
