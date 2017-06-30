<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['rut', 'dv', 'name', 'lastname'];

    /**
     * Get the item for KeyLoansDeliveries.
     */
    public function keyLoanDeliveries()
    {
        return $this->hasMany('App\KeyLoan', 'rut', 'delivery_rut');
    }

    /**
     * Get the item for KeyLoansReturns.
     */
    public function keyLoanReturns()
    {
        return $this->hasMany('App\KeyLoan', 'rut', 'return_rut');
    }
}
