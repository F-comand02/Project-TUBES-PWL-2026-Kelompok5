<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
        protected $fillable = [
    'user_id',
    'assigned_volunteer_id',
    'shelter_id',
    'handled_by',
    'title',
    'description',
    'category',
    'urgency_level',
    'status',
    ];

    public function images()
    {
        return $this->hasMany(ComplaintImage::class);
    }
    public function firstImage()
    {
        return $this->hasOne(ComplaintImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedVolunteer()
    {
        return $this->belongsTo(
            User::class,
            'assigned_volunteer_id'
        );
    }

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }
}
