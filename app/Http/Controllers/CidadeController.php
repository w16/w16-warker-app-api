<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function index() {
        return Cidade::all();
    }

    public function show($id) {
        return Cidade::findOrFail($id);
    }
}
