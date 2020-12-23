<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posto;

class PostoController extends Controller
{
    public function index() {
        return Posto::all();
    }
}
