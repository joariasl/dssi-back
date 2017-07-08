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

    /**
     * Get the item for Area.
     */
    public function area()
    {
        return $this->belongsTo('App\Area', 'area_id', 'id');
    }

    /**
     * Get the item for Users.
     */
    public function users()
    {
        return $this->hasMany('App\User', 'amphitryon_id', 'id');
    }
}
