<?php
	$credit = "credit";
	$debit = "debit";
	$enable = "enable";
	
	$query11 = " SELECT * FROM wallet WHERE wallet_address = '{$wallet}' AND status = '{$credit}'";
	$run_query11 = mysqli_query($connection, $query11);
	$amount = 0;
	
	while($result = mysqli_fetch_assoc($run_query11)){
		$amount += $result['amount'];
	}
	
	$amount2 = 0;
	$query111 = " SELECT * FROM wallet WHERE wallet_address = '{$wallet}' AND status = '{$debit}'";
	$run_query111 = mysqli_query($connection, $query111);
	while($result = mysqli_fetch_assoc($run_query111)){
		$amount2 += $result['amount'];
	}
	$account = $amount - $amount2;
?>
<script src="js/clipboard.js"></script>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> My Defi - Invest ACCOUNT</h1>
  </div>
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="user_dashboard.php?p=wallet_statement">Account Statement</a></li>
	</ul>
  </div>
</div>
<div class="row card">
  <div class="col-md-12">
	<div class="widget-small warning"><i class="icon fa fa-btc fa-3x"></i>
	  <div class="info">
		<h4 class="text-center" style="color:#fff;">USD</h4>
		<p class="text-center"><b><?php 
			
			if($account == 0){
				echo "0.00";
			}else{
				echo $account;
			}
		?></b></p>
	  </div>
	</div>
  </div>
 </div>
 <div class="row card">
	<div class="col-md-6  card">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-3">
			</div>
			<div class="col-md-4 col-sm-4 col-xs-6">
				<div class="card-title-w-btn">
					<div class="btn-group"><a class="btn btn-primary" title="Make Investments" href="user_dashboard.php?p=cryptocurrency_plans"><i class="fa fa-lg fa-rocket"></i></a><a class="btn btn-info" title="Deposit funds into wallet" href="user_dashboard.php?p=deposit_funds"><i class="fa fa-lg fa-download"></i></a><a class="btn btn-warning" title="Withdraw Funds" href="user_dashboard.php?p=new_withdrawal"><i class="fa fa-lg fa-cc-mastercard"></i></a></div>
				 </div> 
			</div>
			<div class="col-md-4 col-sm-4 col-xs-3">
			</div>
		</div>
	</div>
	 <div class="col-md-6 card">
		<div class="top-title center">
			<h3 class="main_title white text-center" style="color:#1A001A;">CRYPTOCURRENCY PRICES <em></em></h3>
		</div>
		<script>
			baseUrl = "https://widgets.cryptocompare.com/";
			var scripts = document.getElementsByTagName("script");
			var embedder = scripts[scripts.length - 1];
			(function() {
				var appName = encodeURIComponent(window.location.hostname);
				if (appName == "") {
					appName = "local";
				}
				var s = document.createElement("script");
				s.type = "text/javascript";
				s.async = true;
				var theUrl = baseUrl + 'serve/v1/coin/multi?fsyms=BTC,ETH,XMR,LTC,XRP,NEO,DASH&tsyms=USD,EUR,CNY,GBP';
				s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
				embedder.parentNode.appendChild(s);
			})();
		</script>
	</div>
</div>
<div class="row card">
	<div class="col-md-6 col-sm-12">
		<div class="tradingview-widget-container">
		  <div class="tradingview-widget-container__widget"></div>
		  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
		  {
		  "width": 400,
		  "height": 450,
		  "currencies": [
			"EUR",
			"USD",
			"JPY",
			"GBP",
			"CHF",
			"AUD",
			"CAD",
			"NZD",
			"CNY"
		  ],
		  "locale": "en"
		}
		  </script>
		</div>
	</div><br>
	<div class="col-md-6 col-sm-12">
		<div class="tradingview-widget-container">
		  <div class="tradingview-widget-container__widget"></div>
		  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
		  {
		  "exchange": "US",
		  "showChart": true,
		  "locale": "en",
		  "largeChartUrl": "",
		  "width": "400",
		  "height": "450",
		  "plotLineColorGrowing": "rgba(60, 188, 152, 1)",
		  "plotLineColorFalling": "rgba(255, 74, 104, 1)",
		  "gridLineColor": "rgba(242, 243, 245, 1)",
		  "scaleFontColor": "rgba(214, 216, 224, 1)",
		  "belowLineFillColorGrowing": "rgba(60, 188, 152, 0.05)",
		  "belowLineFillColorFalling": "rgba(255, 74, 104, 0.05)",
		  "symbolActiveColor": "rgba(242, 250, 254, 1)"
		}
		  </script>
		</div>
	</div>
</div>
<script>
    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>