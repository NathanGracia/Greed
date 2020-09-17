<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradeloggerController extends Controller
{
    public function show(){
        $url = 'https://api.coingecko.com/api/v3/simple/supported_vs_currencies';
  
        
        $response = file_get_contents($url);
        dd($response);
    }
}
