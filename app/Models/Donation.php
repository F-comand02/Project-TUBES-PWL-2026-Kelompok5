<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'shelter_id',
        'user_id',
        'volunteer_id',   // ← TAMBAHAN: volunteer yang mengambil misi pengiriman
        'donor_name',
        'item_name',
        'quantity',
        'status',         // pending | on_delivery | received | confirmed
        'notes',
        'donation_date',
        'category_id',
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

    /**
     * Volunteer yang mengambil misi pengiriman donasi ini
     */
    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }

    public function category()
    {
        return $this->belongsTo(
            LogisticsCategory::class
        );
    }
}