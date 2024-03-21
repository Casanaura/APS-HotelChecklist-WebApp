<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelOrder extends Model
{
    protected $fillable = [
        'user_id',
        'os_number',
        'airline_id',
        'flight_number',
        'passenger_names',
        'type',
        'breakfast',
        'meal',
        'dinner',
        'contact_number',
        'hotel_id',
        'checkin_date',
        'checkin_time',
        'checkout_date',
        'checkout_time',
        'new_flight_number',
    ];

    public function hotel()
    {
        return $this->belongsTo(ListHotel::class, 'hotel_id');
    }

    public function airline()
    {
        return $this->belongsTo(ListAirline::class, 'airline_id');
    }
}
