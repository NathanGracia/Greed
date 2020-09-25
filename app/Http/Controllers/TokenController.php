<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function show($slug){
        $slug = strtoupper($slug);
        $token= \DB::table('tokens')->where('slug',$slug)->first();
       
        return view('token.show', ['token' => $token]);
 
    }
    public function showAll(){
  
        $tokens= \DB::table('tokens')->get();
        return view('token.showAll', ['tokens' => $tokens]);
    }
}
