<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
        protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'urgency_level',
        'status',
        'image',
    ];

    public function images()
    {
        return $this->hasMany(ComplaintImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
