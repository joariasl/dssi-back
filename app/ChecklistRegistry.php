<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistRegistry extends Model
{
    protected $fillable = ['id', 'date', 'turn', 'checklist_id', 'user_id', 'credential_avaliable', 'credential_delivered'];

    /**
     * Get the item for Checklist.
     */
    public function checklist()
    {
        return $this->belongsTo('App\Checklist');
    }

    /**
     * Get the items for ChecklistRegistry.
     */
    public function checklistEntries()
    {
        return $this->hasMany('App\ChecklistEntry');
    }
}
