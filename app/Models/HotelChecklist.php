<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelChecklist extends Model
{
    protected $table = 'list_hotels'; // Specify the correct table name

    protected $fillable = [
        'name',
        'display_name', 
        'location', 
        'single_bed', 
        'double_bed'
    ];
}
