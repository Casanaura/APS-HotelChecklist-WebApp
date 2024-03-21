<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportOrder extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'passenger_names',
        'airline_id',
        'flight_number',
        'pickup_location',
        'destination',
        'transport_id',
        'economy_number',
        'pnr',
        'departure_date',
        'departure_time',
        'return_date',
        'return_time',
        'folio',
    ];

    public function airline()
    {
        return $this->belongsTo(ListAirline::class, 'airline_id');
    }

    public function fleet()
    {
        return $this->belongsTo(ListTransport::class, 'transport_id');
    }
}
