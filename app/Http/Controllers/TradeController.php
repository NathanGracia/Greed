<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function show($slug)
    {
        $trade= \DB::table('trades')->where('id',$slug)->first();
        dd($trade); 

    

    }
}
