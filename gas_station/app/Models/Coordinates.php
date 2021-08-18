<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinates extends Model
{

    // Generate model with php artisan make:model Coordinate -a

    use HasFactory;

    // indicating the relationship with gas_station
    public function gas_station()
    {
        // a coordinate can belong to a gas_station
        return $this->belongsTo(GasStation::class);
    }
}
