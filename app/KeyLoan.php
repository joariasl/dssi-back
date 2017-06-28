<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyLoan extends Model
{
    protected $fillable = ['id', 'key_id', 'delivery_rut', 'return_rut', 'return_condition', 'observations'];
}
