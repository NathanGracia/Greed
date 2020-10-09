@extends('layout')
@section('pageName')
Editer un trade
@endsection
@section('body')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
      <h3><strong>Trade : {{ $trade->new_token }} - {{ $trade->old_token }}</strong> du <strong>{{ date('d/m/Y',$trade->date) }}</strong> </h3>
    </div>
</div>
<form method="get" action="{{ url("trade/update/". $trade->id) }}">
    @csrf
    <div class="form-group">
      <label for="date">Date d'achat (jj/mm/aaaa)</label>
      <input type="text" name ="date" value="{{ date('d/m/Y',$trade->date) }}" class="form-control" id="date" placeholder="16/06/2001">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Type</label>
        <select class="form-control" name="type" id="exampleFormControlSelect1">
            <option value="{{ $trade->type }}" selected hidden> {{ $trade->type }} </option>
            <option value="Long" >Long</option>
            <option value="Short">Short</option>
           
          </select>
      </div>
      <div class="form-group">
        <label for="date">Token acheté (Abréviation, genre BTC pour Bitcoin)</label>
      <input type="text" name ="new_token" class="form-control" id="new_token" value="{{ $trade->new_token }}"placeholder="BTC">
      </div>
      <div class="form-group">
        <label for="date">Valeur du token acheté en USD</label>
        <input type="text" name ="new_token_usd" class="form-control" value="{{ $trade->new_token_usd }}"id="new_token_usd" placeholder="8000">
      </div>
      <div class="form-group">
        <label for="date">Token vendu (Abréviation)</label>
        <input type="text" name ="old_token" class="form-control" value="{{ $trade->old_token }}" id="old_token" placeholder="USDT">
      </div>

      <div class="form-group">
        <label for="date">Prix acheté (en token vendu)</label>
        <input type="text" name ="start_price" class="form-control" value="{{ $trade->start_price }}" id="start_price" placeholder="8000">
      </div>
      <div class="form-group">
        <label for="date">Quantité de token acheté</label>
        <input type="text" name ="quantity" class="form-control" value="{{ $trade->quantity }}" id="quantity" placeholder="2">
      </div>
      <div class="form-group">
        <label for="date">Stop loss</label>
        <input type="text" name ="stop_price" class="form-control" value="{{ $trade->stop_price }}" id="stop_price" placeholder="7000">
      </div>
      <div class="form-group">
        <label for="date">Limit - Take profit</label>
        <input type="text" name ="limit_price" class="form-control" value="{{ $trade->limit_price }}" id="limit_price" placeholder="8000">
      </div>
      <div class="form-group">
        <label for="date">Capital de départ</label>
        <input type="text" name ="start_capital" class="form-control" value="{{ $trade->start_capital }}" id="start_capital" placeholder="10000">
      </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Commentaire</label>
      <textarea class="form-control" id="comment" name="comment" value="" rows="3">{{ $trade->comment }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection