<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amphitryon extends Model
{
    protected $fillable = ['id', 'person_rut', 'username', 'email' , 'admission_date', 'retirement_date'];

    /**
     * Get the item for KeyLoansDeliveries.
     */
    public function keyLoanDeliveries()
    {
        return $this->hasMany('App\KeyLoan', 'id', 'delivery_amphitryon_id');
    }

    /**
     * Get the item for KeyLoansReturns.
     */
    public function keyLoanReturns()
    {
        return $this->hasMany('App\KeyLoan', 'id', 'return_amphitryon_id');
    }

    /**
     * Get the item for Person.
     */
    public function person()
    {
        return $this->belongsTo('App\Person', 'person_rut', 'rut');
    }
}
