@extends('layout')
@section('pageName')
Trade du {{ date('d/m/Y',$trade->date) }}
@endsection
@section('body')

<div class="row">
    <div class="col-md-5" style="padding: 0%">
        <div class="card flex-fill">
            <div class="card-header">

                <h1 class="card-title mb-0" style="font-size: 30px"><strong>Résumé du trade</strong></h1>
            </div>
            <div class="card-body" style=" font-size: 20px;margin-left: 5%;margin-right: 5%;">
                <p> <strong style="margin-bottom: 2%;">Date : </strong> {{ date('d/m/Y',$trade->date) }}</p>
                <p> <strong>Marché :</strong> {{ $trade->old_token }} - {{ $trade->new_token }} </p>
                <p> <strong>Taille de la position :</strong> {{ $trade->new_token_usd }} $ </p>
                <p> <strong>status</strong> {{ $trade->status }} </p>
                <hr>
                <p>
                    <div class="mb-3" style="margin-top: 7%; text-align: center;">
                        <button id="simulation" @if($trade->status == 'simulation')
                            class="btn btn-secondary" value="none"
                            @else
                            class="btn btn-outline-secondary" value="simulation"
                            @endif
                            >Simulation</button>


                        <button id="open" @if($trade->status == 'open')
                            class="btn btn-primary" value="none"
                            @else
                            class="btn btn-outline-primary" value="open"
                            @endif
                            >Ouvert</button>

                        <button id="complete" @if($trade->status == 'complete')
                            class="btn btn-success" value="none"
                            @else
                            class="btn btn-outline-success" value="complete"
                            @endif
                            >Complété</button>

                        <button id="cancelled" @if($trade->status == 'cancelled')
                            class="btn btn-danger" value="none"
                            @else
                            class="btn btn-outline-danger" value="cancelled"
                            @endif
                            >Annulé</button>


                    </div>
                </p>
            </div>

        </div>



    </div>
    <div class="col-md-7">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div id="tradingview_9a518"></div>
            <div class="tradingview-widget-copyright">
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                    new TradingView.widget({
                            "width": 800,
                            "height": 400,
                            "symbol": "{{ $trade->new_token }}USD",
                            "interval": "D",
                            "timezone": "Etc/UTC",
                            "theme": "dark",
                            "style": "1",
                            "locale": "fr",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "allow_symbol_change": true,
                            "container_id": "tradingview_9a517"
                        });

                </script>
            </div>
            <!-- TradingView Widget END -->

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class=card>
            <div class="card-header">

                <h1 class="card-title mb-0" style="font-size: 30px"><strong>Détails</strong></h1>
            </div>
            <div class="card-body" style=" font-size: 17px;margin-left: 3%;margin-right: 5%;">
                <div class="row">

                    <div class="col-md-4">
                        <p> <strong style="margin-bottom: 2%;">Prix d'entrée : </strong> {{ $trade->start_price }} {{ $trade->old_token }}</p>
                        <p> <strong>Stop loss :</strong> {{ $trade->stop_price }} {{ $trade->old_token }} </p>
                        <p> <strong>Limit - Take profit :</strong> {{ $trade->limit_price }} {{ $trade->old_token }} </p>
                        <p> <strong>Quantité de tokens achetés :</strong> {{ $trade->quantity }} </p>
                    
                    </div>
                    <div class="col-md-4">
                        <p> <strong style="margin-bottom: 2%;">Capital de départ : </strong> {{ $trade->start_capital }}</p>
                        <p> <strong>Pourcentage de capital risqué :</strong> {{ round((($trade->new_token_usd-$trade->stop_price)*$trade->quantity)/$trade->start_capital*100, 2) }} %</p>
                        <p> <strong>Limit - Take profit :</strong> {{ $trade->limit_price }} {{ $trade->old_token }} </p>
                        <p> <strong>Quantité de tokens achetés :</strong> {{ $trade->quantity }} </p>
                    
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    console.log('aa');
    function resetButtons(){
        let buttonOpen = document.getElementById('open');
        let buttonSimulation = document.getElementById('simulation');
        let buttonComplete = document.getElementById('complete');
        let buttonCancelled = document.getElementById('cancelled');

        buttonOpen.classList.add('btn-outline-primary');
        buttonOpen.classList.remove('btn-primary');
        buttonSimulation.classList.add('btn-outline-secondary');
        buttonSimulation.classList.remove('btn-secondary');
        buttonComplete.classList.add('btn-outline-success');
        buttonComplete.classList.remove('btn-success');
        buttonCancelled.classList.add('btn-outline-danger');
        buttonCancelled.classList.remove('btn-danger');
    }
      
    
//SIMULATION
        
        let buttonSimulation = document.getElementById('simulation');
        buttonSimulation.addEventListener('click', function(){
            console.log(buttonSimulation.value);
            //change view before ajax parceque sinon y a un peu de lag appres le click
            resetButtons()
            if(buttonSimulation.value == 'none'){
                
             
            } else {
                buttonSimulation.classList.remove('btn-outline-secondary');
                buttonSimulation.classList.add('btn-secondary');
           
            }
                
            $.ajax({
                url: '/trade/statusChange/{{ $trade->id }}',
                method: 'GET',
                data: {
                "status": buttonSimulation.value
                },
                succes: function (resultat,status,rq){
                
                
                },
                error: function(resultat, status, erreur){
                
                },
                complete: function(resultat, status){
                   

                }
        
            }) 
            if(buttonSimulation.value == 'none'){
                
                buttonSimulation.value = 'simulation';
            } else {
       
                buttonSimulation.value = 'none';
            }
        })

//OPEN
        
        let buttonOpen = document.getElementById('open');
        buttonOpen.addEventListener('click', function(){
            console.log(buttonOpen.value);
            //change view before ajax parceque sinon y a un peu de lag appres le click
            resetButtons()
            if(buttonOpen.value == 'none'){
                
              
            } else {
                buttonOpen.classList.remove('btn-outline-primary');
                buttonOpen.classList.add('btn-primary');
         
            }
                
            $.ajax({
                url: '/trade/statusChange/{{ $trade->id }}',
                method: 'GET',
                data: {
                "status": buttonOpen.value
                },
                succes: function (resultat,status,rq){
                
                
                },
                error: function(resultat, status, erreur){
                
                },
                complete: function(resultat, status){
                   

                }
        
            }) 
            if(buttonOpen.value == 'none'){
                
                buttonOpen.value = 'open';
            } else {
           
                buttonOpen.value = 'none';
            }
        })

//complete
        
        let buttonComplete = document.getElementById('complete');
        buttonComplete.addEventListener('click', function(){
            console.log(buttonComplete.value);
            //change view before ajax parceque sinon y a un peu de lag appres le click
            resetButtons()
            if(buttonComplete.value == 'none'){
                
            
            } else {
                buttonComplete.classList.remove('btn-outline-success');
                buttonComplete.classList.add('btn-success');
             
            }
                
            $.ajax({
                url: '/trade/statusChange/{{ $trade->id }}',
                method: 'GET',
                data: {
                "status": buttonComplete.value
                },
                succes: function (resultat,status,rq){
                
                
                },
                error: function(resultat, status, erreur){
                
                },
                complete: function(resultat, status){
                   console.log(buttonComplete.value);

                }
        
            }) 
            if(buttonComplete.value == 'none'){
                
                buttonComplete.value = 'complete';
            } else {
              
                buttonComplete.value = 'none';
            }
        })

//cancelled
        
        let buttonCancelled = document.getElementById('cancelled');
        buttonCancelled.addEventListener('click', function(){
            console.log(buttonCancelled.value);
            //change view before ajax parceque sinon y a un peu de lag appres le click
            resetButtons()
            if(buttonCancelled.value == 'none'){
                
           
            } else {
                buttonCancelled.classList.remove('btn-outline-danger');
                buttonCancelled.classList.add('btn-danger');
             
            }
                
            $.ajax({
                url: '/trade/statusChange/{{ $trade->id }}',
                method: 'GET',
                data: {
                "status": buttonCancelled.value
                },
                succes: function (resultat,status,rq){
                
                
                },
                error: function(resultat, status, erreur){
                
                },
                complete: function(resultat, status){
                   

                }
                
        
            })
            if(buttonCancelled.value == 'none'){
                
                buttonCancelled.value = 'cancelled';
            } else {
               
                buttonCancelled.value = 'none';
            } 
        })
  
</script>
@endsection