<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HoneybadgerController extends Controller
{
    public function index()
    {
        // Lógica para lidar com a rota do Honeybadger
        return view('honeybadger.card'); // ou qualquer outra resposta desejada
    }
}
