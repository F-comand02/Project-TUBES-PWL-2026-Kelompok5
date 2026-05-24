<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    protected $fillable = [
    'category_id',
    'item_name',
    'stock',
    'minimum_stock',
    'expired_date',
    'description'
    ];

    public function category()
    {
        return $this->belongsTo(LogisticsCategory::class);
    }

    public function shelter()
    {
    return $this->belongsTo(Shelter::class);
    }
}
