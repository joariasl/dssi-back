<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['rut', 'dv', 'name', 'lastname', 'birthdate', 'gender'];

    /**
     * Get the item for Amphitryon.
     */
    public function amphitryon()
    {
       return $this->hasOne('App\Amphitryon', 'rut', 'person_rut');
    }

}
