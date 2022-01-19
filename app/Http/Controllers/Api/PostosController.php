<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posto;

class PostosController extends Controller
{
    public function getPosto($id) {
    	$posto = Posto::find($id);

    	if(is_null($posto)) {
    		return response()->json([]);
    	}

    	return response()->json($posto);
    }
}
