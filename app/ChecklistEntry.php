<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistEntry extends Model
{
    protected $fillable = ['id', 'checklist_registry_id', 'checklist_item_id', 'response', 'observations'];
}
