<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistEntry extends Model
{
    protected $fillable = ['id', 'checklist_registry_id', 'checklist_item_id', 'response', 'observations'];

    /**
     * Get the item for ChecklistRegistry.
     */
    public function checklistRegistry()
    {
        return $this->belongsTo('App\ChecklistRegistry');
    }
}
