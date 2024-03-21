<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealOrder extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'gender',
        'age',
        'nationality',
        'airline_id',
        'delivery_date',
        'delivery_time',
        'status',
    ];

    public function airline()
    {
        return $this->belongsTo(ListAirline::class, 'airline_id');
    }
}
