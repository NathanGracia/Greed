<!DOCTYPE html>
<html lang="en">
<!-- TEMPLATE : https://demo.adminkit.io/ -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

	<link rel="shortcut icon" href="{{ asset('img/iconBlue.png') }}" />

	<title>@yield('pageName')</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
	
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar" >
				<a class="sidebar-brand" href="index.html" style="text-align : center; margin-left: -35px" >
					<img src="{{ asset('img/iconBlue.png') }}" style="max-width: 35px; margin-right: 10px;" alt="iconGreen">
          <span class="align-middle" >Greed</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item" class="{{ (request()->is('/')) ? 'active' : '' }}">
						<a class="sidebar-link" href="/">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item" class="{{ (request()->is('/token*')) ? 'active' : '' }}">
						<a class="sidebar-link" href="/tokens">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Tokens</span>
            </a>
					</li>

					<li class="sidebar-item" class="{{ (request()->is('/geckoTokens')) ? 'active' : '' }}">
						<a class="sidebar-link" href="/geckoTokens">
              <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Gecko Tokens</span>
            </a>
					</li>

					<li class="sidebar-item" class="{{ (request()->is('/trades')) ? 'active' : '' }}">
						<a class="sidebar-link" href="/trades">
              <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Trades</span>
            </a>
					</li>

					<li class="sidebar-item" class="{{ (request()->is('/trade/new')) ? 'active' : '' }}">
						<a class="sidebar-link" href="/trade/new">
              <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Nouveau trade</span>
            </a>
					</li>

					<li class="sidebar-header">
						Tools & Components
					</li>
					<li class="sidebar-item">
						<a href="#ui" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">UI Elements</span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Alerts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Buttons</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Cards</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">General</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Grid</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-modals.html">Modals</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Typography</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="icons-feather.html">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a href="#forms" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Forms</span>
            </a>
						<ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="forms-layouts.html">Form Layouts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.html">Basic Inputs</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="tables-bootstrap.html">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Tables</span>
            </a>
					</li>

					<li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.html">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.html">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
            </a>
					</li>
				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Upgrade to Pro</strong>
						<div class="mb-3 text-sm">
							Are you looking for more components?
						</div>
						<a href="https://adminkit.io/pricing" target="_blank" class="btn btn-outline-primary btn-block">Upgrade</a>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			

			<main class="content" style="margin-bottom: 4%">
				<div class="container-fluid p-0"> 
					
					@yield('body')

				</div>
			</main>
			

		
		</div>
		
	</div>
	<footer class="footer fixed-bottom" style="padding :0">
		<div class="" style="padding :0">
			<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
	<div class="tradingview-widget-container__widget"></div>
	
	<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
	{
	"symbols": [
		@for($t = 0; $t < count($myTokens); $t++)
					@if($t == count($myTokens)-1)
						{
						
							"proName": "{{$myTokens[$t]->slug}}USD",
							"title": "{{$myTokens[$t]->name}}"
						}
					@else
					{
						
							"proName": "{{$myTokens[$t]->slug}}USD",
							"title": "{{$myTokens[$t]->name}}"
						},
					@endif
					@endfor
	],
	"colorTheme": "dark",
	"isTransparent": false,
	"displayMode": "adaptive",
	"locale": "fr"
  }
	</script>
  </div>
  <!-- TradingView Widget END -->
		</div>
	</footer>
	<script src="{{ asset('js/app.js') }}"></script>
	@yield('js')

	
	
	
	

</body>

</html>