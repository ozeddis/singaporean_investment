<?php
	$query = " SELECT * FROM admin WHERE id = '{$_SESSION['manager_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
		}
	}

	$credit = "credit";
	$debit = "debit";

	$query11 = " SELECT * FROM wallet WHERE  status = '{$credit}'";
	$run_query11 = mysqli_query($connection, $query11);
	$amount = 0;

	while($result = mysqli_fetch_assoc($run_query11)){
		$amount += $result['amount'];
	}

	$amount2 = 0;
	$query111 = " SELECT * FROM wallet WHERE status = '{$debit}'";
	$run_query111 = mysqli_query($connection, $query111);
	while($result = mysqli_fetch_assoc($run_query111)){
		$amount2 += $result['amount'];
	}
	$account = ($amount - $amount2);
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Dashboard</h1>
	<p>Welcome to Agro Capital Management </p>
  </div>
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="#">Dashboard</a></li>
	</ul>
  </div>
</div>
<div class="row card">
  <div class="col-md-3">
	<div class="widget-small primary"><i class="icon fa fa-dollar fa-3x"></i>
	  <div class="info">
		<h4 class="text-center" style="color:#fff;">Investments</h4>
		<p class="text-center"><b>$<?php
			$pending = "pending";
			$query = "SELECT * FROM withdrawal WHERE status = '{$pending}'";
			$run_query = mysqli_query($connection, $query);

			if(mysqli_num_rows($run_query) > 0){
				$sum33 = 0;
				while($result = mysqli_fetch_assoc($run_query)){
					$sum33 += $result['main_money'];
				}
				echo $sum33;
			}else{
				echo "0.00";
			}
		?></b></p>
	  </div>
	</div>
  </div>
  <div class="col-md-3">
	<div class="widget-small info"><i class="icon fa fa-dollar fa-3x"></i>
	  <div class="info">
		<h4 class="text-center" style="color:#fff;">ROI</h4>
		<p class="text-center"><b>$<?php
			$pending = "pending";
			$query = "SELECT * FROM withdrawal WHERE status = '{$pending}'";
			$run_query = mysqli_query($connection, $query);

			if(mysqli_num_rows($run_query) > 0){
				$sum = 0;
				while($result = mysqli_fetch_assoc($run_query)){
					$sum += $result['earnings'];
				}

				echo $sum;
			}else{
				echo "0.00";
			}
		?></b></p>
	  </div>
	</div>
  </div>
  <div class="col-md-3">
	<div class="widget-small warning"><i class="icon fa fa-dollar fa-3x"></i>
	  <div class="info">
		<h4 class="text-center" style="color:#fff;">Balance</h4>
		<p class="text-center"><b>$<?php
			if($account > 0){
				echo $account;
			}else{
				echo "0.00";
			}
		?></b></p>
	  </div>
	</div>
  </div>
  <div class="col-md-3">
	<div class="widget-small danger"><i class="icon fa fa-dollar fa-3x"></i>
	  <div class="info">
		<h4 class="text-center" style="color:#fff;">Total Withdrawn</h4>
		<p class="text-center"><b>$<?php
			$status22 = "active";
			$query = "SELECT * FROM withdraw_from_wallet WHERE status = '{$status22}'";
			$run_query = mysqli_query($connection, $query);

			if(mysqli_num_rows($run_query) > 0){
				$sum = 0;
				while($result = mysqli_fetch_assoc($run_query)){
					$sum += $result['amount'];
				}
				echo $sum;
			}else{
				echo "0.00";
			}

		?></b></p>
	  </div>
	</div>
  </div>
</div>
<div class="row card">
	<div class="col-md-6 col-sm-12">
		<div class="tradingview-widget-container">
		  <div class="tradingview-widget-container__widget"></div>
		  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
		  {
		  "width": 350,
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
		  "width": "350",
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
