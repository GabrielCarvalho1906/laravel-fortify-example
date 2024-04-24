<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZabbixController extends Controller
{
    public function showCard()
    {
        return view('zabbix.card');
    }
}

