
@extends('layout')
@section('pageName')
Token - {{ $token->name }}
@endsection

@section('body')
   
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3>Token -> <strong>{{ $token->name }}</strong> </h3>
    </div>
</div>

<div class="row">
  
        <div class="col-md-6 ">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title mb-0">Prix USD</h5>
                </div>
                <div class="card-body">
                <h1>{{ $token->usdPrice }} $</h1>
                <div class="mb-1">
                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> +3.65% </span>
                    <span class="text-muted">Depuis hier</span>
                </div>
                 
                </div>
            </div>
        </div>
        
        <div class="col-md-6 ">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title mb-0">Une autre carte pour faire joli mais je sais pas quoi</h5>
                </div>
                <div class="card-body">
                <h1>{{ $token->usdPrice }} $</h1>
                 
                </div>
            </div>
        </div>
 
</div>

<div class="row">
    <div class ="col-md-6 row">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div id="tradingview_9a518"></div>
            <div class="tradingview-widget-copyright"><a href="https://fr.tradingview.com/symbols/{{ $token->slug }}TUSD/?exchange=BINANCE" rel="noopener" target="_blank">
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
            new TradingView.widget(
            {
            "width": 1500,
            "height": 650,
            "symbol": "BINANCE:{{ $token->slug }}TUSD",
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": "dark",
            "style": "1",
            "locale": "fr",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "allow_symbol_change": true,
            "container_id": "tradingview_9a517"
        }
            );
            </script>
        </div>
        <!-- TradingView Widget END -->
    
    </div>
</div>





@endsection
@section('js')
<script>
    $(function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: 'pie',
            data: {
                labels: ["Chrome", "Firefox", "IE"],
                datasets: [{
                    data: [4306, 3801, 1689],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>
@endsection
