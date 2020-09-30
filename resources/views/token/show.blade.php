@extends('layout')
@section('pageName')
    Token ->{{ $token->name }}
@endsection

@section('body')

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <a href="/tokens" style="color :#000"><h3>Token </a>-> <strong>{{ $token->name }}</strong> </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 row">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div id="tradingview_9a518"></div>
                <div class="tradingview-widget-copyright">
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget({
                                "width": 1200,
                                "height": 650,
                                "symbol": "{{ $token->slug }}USD",
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

    <div class="row" style="margin-top : 2%;">

        <div class="col-md-6 ">
            <div class="card ">
                <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
    {
    "symbol": "{{ $token->slug }}USD",
    "width": "100%",
    "colorTheme": "light",
    "isTransparent": true,
    "locale": "fr"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="card ">

                <div class="card-body" style=" display: flex;
                                                    align-items: center;
                                                    justify-content: center;">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript"
                            src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                            {
                                "interval": "1m",
                                "width": 425,
                                "isTransparent": true,
                                "height": 450,
                                "symbol": "{{ $token->slug }}USD",
                                "showIntervalTabs": true,
                                "locale": "fr",
                                "colorTheme": "light"
                            }

                        </script>
                    </div>
                    <!-- TradingView Widget END -->

                </div>
            </div>
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
