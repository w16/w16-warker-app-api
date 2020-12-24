<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posto;
use Illuminate\Support\Facades\DB;

class PostoController extends Controller
{
    public function index(Request $request) {
        if($request->all()) {
            $request->validate([
                'lat' => 'required|numeric',
                'lng' => 'required|numeric',
            ]);

            $lat = $request->lat;
            $lng = $request->lng;

            //Pegamos o range do parametro
            //ou colocamos o padrão
            $range = $request->range != null ? $request->range : 2;

            $minLat = $lat-$range;
            $maxLat = $lat+$range;

            $minLng = $lng-$range;
            $maxLng = $lng+$range;

            return Posto::
                whereBetween('latitude', [$minLat, $maxLat])->
                whereBetween('longitude', [$minLng, $maxLng])
                ->get();
        }

        return Posto::all();
    }

    public function show($id) {
        return Posto::findOrFail($id);
    }
}
