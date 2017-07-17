<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = ['id', 'key_condition_id', 'property_id', 'code', 'key_loan_status'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['key_loan_status'];

    /**
     * Get the item for KeyLoans.
     */
    public function keyLoans()
    {
        return $this->hasMany('App\KeyLoan');
    }

    /**
     * Get the item for KeyCondition.
     */
    public function keyCondition()
    {
        return $this->belongsTo('App\KeyCondition');
    }

    /**
     * Get the loan status for Key based on if exists an KeyLoan without return_amphitryon_id.
     * Return:
     *  0: No loaned
     *  1: Loaned
     */
    public function getKeyLoanStatusAttribute()
    {
        if($this->keyLoans()->where('key_loans.return_amphitryon_id', null)->count() > 0){
            return 1;
        }
        return 0;
    }
}
