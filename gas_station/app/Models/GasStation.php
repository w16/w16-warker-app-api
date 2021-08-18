<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasStation extends Model
{

    // Generate model with php artisan make:model GasStation -a

    use HasFactory;

    // function tha indicate the relationship between gas_station and coordinates
    public function coordinates()
    {
        // to every gas_station it must hava a coordination too
        $this->hasOne(Coordinates::class);
    }
}
