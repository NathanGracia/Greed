<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\Trade;

class TradeController extends Controller
{
    public function show(){
        
    }

    public function index(){
        $trades= \DB::table('trades')->get();
        return Controller::customView('trade.indexTrade', [
            "trades" =>$trades
        ]);
    }

    public function new(Request $request){
     
        return Controller::customView('trade.newTrade');
    }

    public function create(Request $request){
        $date = $request["date"];    
        $dtime = DateTime::createFromFormat("d/m/Y", $date);
        $dateTimestamp = $dtime->getTimestamp();

        $trade = new Trade();
        $trade->date = $dateTimestamp;
        $trade->type = $request["type"];
        $trade->new_token = $request["new_token"];
        $trade->old_token = $request["old_token"];
        $trade->new_token_usd = $request["new_token_usd"];
        $trade->start_price = $request["start_price"];
        $trade->stop_price = $request["stop_price"];
        $trade->quantity = $request["quantity"];
        $trade->start_capital = $request["start_capital"];
        $trade->comment = $request["comment"];
        
        if(isset($request["start_capital"])&& isset($request["new_token_usd"])&& isset($request["stop_price"]) ){
         
            $trade->capital_risk_usd = ($trade->new_token_usd-$trade->stop_price)*$trade->quantity;
            

        }

        $trade->save();
        

        return redirect('/trades');
   
    }
}
