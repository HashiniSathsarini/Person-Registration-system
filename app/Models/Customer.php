<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'NIC',
        'fullname',
        'gender_id',
        'dob',
        'address',
        'contactnumber',
        'email'
    ];

    // Relationship to Gender
    public function getGenderDetails()
    {
        return $this->hasOne(Gender::class, 'gender_id', 'gender_id');
    }
}
