<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;

class GeckoTokenController extends Controller
{
   
    public function index(){
        //https://api.coingecko.com/api/v3/coins/list
         
             /*    $url = 'https://api.coingecko.com/api/v3/coins/list';
        
                
                $responses = json_decode(file_get_contents($url), true);
                foreach ($responses as $response){
                    $price = 0;
                    //$response['id'],$response['name'],$price,strtoupper($response['symbol'])
                    $token = new Token();

                    $token->geckoId = $response['id'];
                    $token->name = $response['name'];
                    $token->usdPrice = $price;
                    $token->slug = $response['symbol'];
                    
                    $token->save();
                
                }  */


        $tokens= \DB::table('gecko_tokens')->get();
        return Controller::customView('geckoToken.index', ['tokens' => $tokens]);
    }

}
