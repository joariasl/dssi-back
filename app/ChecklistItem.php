<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $fillable = ['id', 'checklist_id', 'checklist_item_group_id', 'name', 'status'];
}
