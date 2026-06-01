<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'shelter_id',
        'user_id',
        'donor_name',
        'item_name',
        'quantity',
        'status',
        'notes',
        'donation_date',
    ];

    protected $casts = [
        'donation_date' => 'date',
    ];

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
