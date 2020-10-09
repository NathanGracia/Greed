<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;

class TokenController extends Controller
{
    public function show($slug){
        $slug = strtoupper($slug);
        $token= \DB::table('tokens')->where('slug',$slug)->first();
       
        return Controller::customView('token.show', ['token' => $token]);
 
    }
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

        $tokens= \DB::table('tokens')->get();
        return Controller::customView('token.index', ['tokens' => $tokens]);
    }

    public function addTokenFormGecko($idGecko){
        $geckoToken = \DB::table('gecko_tokens')->where('id', $idGecko)->first();  
        $token = new Token();
        $token->name = $geckoToken->name;
        $token->slug = $geckoToken->slug;
        $token->usdPrice = $geckoToken->usdPrice;
        $token->save();
      
        return redirect('/tokens');
      
    }

    public function addFavorite($slug, $redirect = true){
        $token = \DB::table('tokens')->where('slug', $slug)->update(['favorite' => true]);  
       
        if($redirect){

            return redirect('/tokens');
        }
      
    }

    public function unFavorite($slug, $redirect = true){
        $token = \DB::table('tokens')->where('slug', $slug)->update(['favorite' => false]);  
       
      
        if($redirect){

            return redirect('/tokens');
        }
      
    }

    public function delete($idGecko){
        \DB::table('tokens')->where('id', $idGecko)->delete();

      
        return redirect('/tokens');
      
    }
}
