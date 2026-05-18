<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintImage extends Model
{
    protected $fillable = [
        'complaint_id',
        'image_path',
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
