<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistRegister extends Model
{
    protected $fillable = ['id', 'turn', 'checklist_id', 'user_id', 'credential_avaliable', 'credential_delivered'];
}
