@extends('layout')
@section('body')

<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
      <h3><strong>Nouveau trade</strong> </h3>
    </div>
</div>
<form method="get" action="{{ url("trade/create") }}">
    @csrf
    <div class="form-group">
      <label for="date">Date d'achat (aaaa-mm-jj)</label>
      <input type="text" name ="date" class="form-control" id="date" placeholder="2020-06-16">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Type</label>
        <select class="form-control" name="type" id="exampleFormControlSelect1">
            <option value="Long" selected>Long</option>
            <option value="Short">Short</option>
           
          </select>
      </div>
      <div class="form-group">
        <label for="date">Token acheté (Abréviation, genre BTC pour Bitcoin)</label>
        <input type="text" name ="new_token" class="form-control" id="new_token" placeholder="BTC">
      </div>
      <div class="form-group">
        <label for="date">Valeur du token acheté en USD</label>
        <input type="text" name ="new_token_usd" class="form-control" id="new_token_usd" placeholder="8000">
      </div>
      <div class="form-group">
        <label for="date">Token vendu (Abréviation)</label>
        <input type="text" name ="old_token" class="form-control" id="old_token" placeholder="USDT">
      </div>

      <div class="form-group">
        <label for="date">Prix acheté (en token vendu)</label>
        <input type="text" name ="start_price" class="form-control" id="start_price" placeholder="8000">
      </div>
      <div class="form-group">
        <label for="date">Quantité de token acheté</label>
        <input type="text" name ="quantity" class="form-control" id="quantity" placeholder="2">
      </div>
      <div class="form-group">
        <label for="date">Stop loss</label>
        <input type="text" name ="stop_price" class="form-control" id="stop_price" placeholder="7000">
      </div>
      <div class="form-group">
        <label for="date">Limit - Take profit</label>
        <input type="text" name ="limit_price" class="form-control" id="limit_price" placeholder="8000">
      </div>
      <div class="form-group">
        <label for="date">Capital de départ</label>
        <input type="text" name ="start_capital" class="form-control" id="start_capital" placeholder="10000">
      </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Commentaire</label>
      <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection