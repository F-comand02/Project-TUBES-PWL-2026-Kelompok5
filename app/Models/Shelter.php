<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $fillable = [
        'shelter_name',
        'address',
        'capacity',
        'current_refugees',
        'status'
    ];

    public function logistics()
    {
        return $this->hasMany(Logistic::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
