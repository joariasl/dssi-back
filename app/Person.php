<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['rut', 'dv', 'name', 'lastname'];

    /**
     * Get the item for KeyLoans.
     */
    public function keyLoanDelivery()
    {
        return $this->hasMany('App\KeyLoan', 'rut', 'delivery_rut');
    }

    /**
     * Get the item for KeyLoans.
     */
    public function keyLoanReturn()
    {
        return $this->hasMany('App\KeyLoan', 'rut', 'return_rut');
    }
}
