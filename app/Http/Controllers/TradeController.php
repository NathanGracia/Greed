<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\Trade;

class TradeController extends Controller
{
    public function show($id){
        $trade= \DB::table('trades')->where('id', $id)->first();
      
        return Controller::customView('trade.show', [
            "trade" =>$trade
        ]);
        
    }

    public function edit($id){
        $trade= \DB::table('trades')->where('id', $id)->first();
      
        return Controller::customView('trade.edit', [
            "trade" =>$trade
        ]);
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
        $trade->limit_price = $request["limit_price"];
        $trade->quantity = $request["quantity"];
        $trade->start_capital = $request["start_capital"];
        $trade->comment = $request["comment"];
        
        if(isset($request["start_capital"]) && isset($request["new_token_usd"])&& isset($request["stop_price"]) ){
         
            $trade->capital_risk_usd = ($trade->new_token_usd-$trade->stop_price)*$trade->quantity;
            

        }

        $trade->save();
        

        return redirect('/trades');
   
    }

    public function update($id, Request $request){
       
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
        $trade->limit_price = $request["limit_price"];
        $trade->quantity = $request["quantity"];
        $trade->start_capital = $request["start_capital"];
        $trade->comment = $request["comment"];
        
        if(isset($request["start_capital"])&& isset($request["new_token_usd"])&& isset($request["stop_price"]) ){
         
            $trade->capital_risk_usd = ($trade->new_token_usd-$trade->stop_price)*$trade->quantity;
            

        }

        \DB::table('trades')->where('id', $id)->update([
            'date' => $trade->date, 
            'type' => $trade->type, 
            'new_token' => $trade->new_token, 
            'old_token' => $trade->old_token, 
            'new_token_usd' => $trade->new_token_usd, 
            'start_price' => $trade->start_price, 
            'stop_price' => $trade->stop_price,
            'limit_price' => $trade->limit_price,
            'quantity' => $trade->quantity, 
            'start_capital' => $trade->start_capital, 
            'comment' => $trade->comment,
            'capital_risk_usd' => $trade->capital_risk_usd
            ]);
        return redirect('/trades');
    }

    public function statusChange($idTrade){
        $status = $_GET['status'];
        
        \DB::table('trades')->where('id', $idTrade)->update([
            'status' => $status
        ]);
        return $status;

    }
}
