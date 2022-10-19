<?php
	require"../include/server.inc.php";
?>
<?php
	$query222 = " SELECT * FROM registration WHERE id = '{$_SESSION['user_id']}'";
	$run_query222 = mysqli_query($connection, $query222);
	if(mysqli_num_rows($run_query222) == 1){
		while($result = mysqli_fetch_assoc($run_query222)){
			$user_id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
			$code = $result['referal'];
			$wallet = $result['wallet'];
			$reg_date = $result['reg_date'];
			$who_refered = $result['who_refered'];
			$btcaccount = $result['btcaccount'];
      $last_login = $result['last_login'];
      $account_id = $result['account_id'];
		}
	}

	$active = "active";
	$query1 = " SELECT * FROM deposits WHERE account_id = '{$account_id}' AND status = '{$active}'";
	$run_query1 = mysqli_query($connection, $query1);
	$dep_sum = 0;
	if(mysqli_num_rows($run_query1) > 0){
		while($result = mysqli_fetch_assoc($run_query1)){
			$trans_id = $result['transaction_id'];

			$pending = "pending";
			$query2 = " SELECT * FROM withdrawal WHERE transaction_id = '{$trans_id}' AND status = '{$pending}'";
			$run_query2 = mysqli_query($connection, $query2);
			while($result = mysqli_fetch_assoc($run_query2)){
				$id = $result['id'];
				$dep_sum += $result['main_money'];
			}
		}
	}

	$des = "ROI";
	$query3 = " SELECT * FROM wallet WHERE description = '{$des}' AND wallet_address = '{$wallet}'";
	$run_query3 = mysqli_query($connection, $query3);
	$tot_earn = 0;
	if(mysqli_num_rows($run_query3) > 0){
		while($result = mysqli_fetch_assoc($run_query3)){
			$user_id = $result['id'];
			$tot_earn += $result['amount'];
		}
	}
?>
<?php
	$query4 = " SELECT * FROM withdraw_from_wallet WHERE account_id = '{$account_id}' AND status = '{$active}'";
	$run_query4 = mysqli_query($connection, $query4);
	$sum22 = 0;
	if(mysqli_num_rows($run_query4) > 0){
		while($result = mysqli_fetch_assoc($run_query4)){
			$sum22 += $result['amount'];
		}
	}
?>
<?php
	$credit = "credit";
	$debit = "debit";
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

	$account = ($amount - $amount2);


?>
<?php
	$demo_tool = "demo";
	$demo = 0.00;
	$queryy = "SELECT * FROM wallet WHERE wallet_address = '{$wallet}' and status = '{$demo_tool}'";
	$run_queryy = mysqli_query($connection, $queryy);
	if(mysqli_num_rows($run_queryy)>0){
		while($result = mysqli_fetch_assoc($run_queryy)){
			$demo += $result['amount'];
		}
	}
?>
<?php
	if(!$_SESSION['user_id']){
		header("location: ../login.php");
	}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="csrf-param" content="_csrf-frontend">
		<meta name="csrf-token" content="theqxqjJwBjWkM6hP-G3-NmXUsFNXWaAi5_Fgz9iBG75dJ_20Ii6cuLlvM5uqIWI79Y7ggM-PtXA8qT0fQdWWw==">
        <title>Dashboard | Account</title>
		<meta name="description" content="Bitcoin, ">
        <link href="bitmag_files/bootstrap.css" rel="stylesheet">
		<link href="bitmag_files/normalize.css" rel="stylesheet">
		<link href="bitmag_files/opensans.css" rel="stylesheet">
		<link href="bitmag_files/all.css" rel="stylesheet">
		<link href="bitmag_files/style.css" rel="stylesheet">
		<link href="bitmag_files/animate.css" rel="stylesheet">        <link rel="icon" type="image/x-icon" href="../assets/logo1.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-">

        <!-- The below script Makes IE understand the new html5 tags are there and applies our CSS to it -->
        <!--[if IE]>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>


<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->


    <style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>
</head>
    <body>
        <div id="preloader" style="display: none;">
        <div id="loader"></div>
    </div>
    <style>
        .help-block {
            width: 100%;
            margin-top: .25rem;
				font-size: 80%;
				color: #dc3545;
            text-align: left;
        }
    </style>
        <div class="wrapper other-pages">
<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <header class="wow slideInDown" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInDown;">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 p-4">
                        <div class="header-panel clearfix">
                            <div class="header-panek__left">
                                <a href="#" class="logo active">
                                    <img alt="" src="../img/logo.png" style="width:200px; height:62px;">
                                    <span></span>
                                </a>
                            </div>
                            <div class="header-panek__right text-right">
                                <nav class="navbox">
                                                                        <ul><li><a href="../index.php">Home</a></li>
<li class="active"><a href="personal-area.php">Personal Area</a></li>
<li><a href="personal_support.php">Support</a></li></ul>
                                </nav>
                                                                <!--UserBtn-->
                                <div class="d-inline-block">

                                        <nav class="usernav text-left">
                                            <ul>
                                                                                                <li class="active"><a href="#"><i class="fas  - "></i> Personal area</a></li>
                                                <li><a href="settings.php"><i class="fas  - "></i> Settings</a></li>
                                                <li><a href="logout.php"><i class="fas  "></i> Log out</a></li>
                                            </ul>
                                        </nav>
                                        <a href="#profileNav" class="actionBtn actionBtn__nobg actionBtn__icon profileBtn">
                                            <i class="user-pic"><img alt="" src="./bitmag_files/defavatar.jpg" style="height: 100%;"></i>
                                             <span><?php echo $username; ?></span>
                                            <i class="fas   "></i>
                                        </a>

                                </div>
                                <!--/-->
                                                                <!--/UserBtn-->
                                <a href="#navMobile" class="actionBtn actionBtn__outline actionBtn__icon">
                                    <i class="fas   ">=</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    <main>

        <div class="container content-box">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2 p-2">

                    <div class="personal-areal__box wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
                        <a href="personal#personal-area__nav" class="actionBtn actionBtn__outline actionBtn__w100p d-none d-md-none mb-2">Personal Menu <i class="fas  "></i></a>
                        <ul class="personal-area__nav page-set"><li class="active"><a href="personal-area.php">
                         <i class="fas  "></i>
							Dashboard
						</a></li>
						<li><a href="deposit.php">
						   <i class="fas  "></i>
							Deposit
						</a></li>
						<li><a href="withdraw.php">
							<i class="fas  t"></i>
							Withdraw
						</a></li>
						<li><a href="history.php">
						   <i class="fas   "></i>
							History
						</a></li>
						<li><a href="referals.php">
						   <i class="fas  "></i>
							Referals
						</a></li>
						<li class=""><a href="settings.php">
						   <i class="fas  "></i>
							Profile
						</a></li>
						<li class=""><a href="personal_support.php">
						   <i class="fas  "></i>
							Support
						</a></li>
						<li class="" ><a href="logout.php">
						   <i class="fas  "></i>
							Logout
						</a></li></ul>
                    </div>

                </div>
                <div class="col-12 col-md-8 col-lg-9 col-xl-10  pl-2 wow fadeInUp" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">

<div class="dashboard-item page-set wow fadeInUp animated" data-wow-delay="0.5s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
<p class="wallets-info">
		<span class="h5">
			 <?php if($account == 0){echo "<i class'active'>Wallet Balance:</i> $0.00 USD";}else{echo "Wallet Balance: $ $account USD";} ?>
		</span>
		<br>
		<!--<span class="h5">
			 <?php if($demo == 0){echo "<i class'active'>Demo Balance:</i> 0.00 USD";}else{echo "Demo Balance: $ $demo USD";} ?>
		</span>-->
</p>
</div>

<div class="dashboard-item page-set wow fadeInUp animated" data-wow-delay="0.5s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
<p class="wallets-info">
		<span class="h5">
			 <?php if($dep_sum == 0){echo "<i class'active'>Active Deposit:</i> $0.00 USD";}else{echo "Active Deposit: $ $dep_sum USD";} ?>
		</span>
		<br>
		<!--<span class="h5">
			 <?php if($demo == 0){echo "<i class'active'>Demo Balance:</i> 0.00 USD";}else{echo "Demo Balance: $ $demo USD";} ?>
		</span>-->
</p>
</div>

<div class="dashboard-item page-set wow fadeInUp animated" data-wow-delay="0.5s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
<p class="wallets-info">
		<span class="h5">
			 <?php if($tot_earn == 0){echo "<i class'active'>Earnings:</i> $0.00 USD";}else{echo "Earnings: $ $tot_earn USD";} ?>
		</span>
		<br>
		<!--<span class="h5">
			 <?php if($demo == 0){echo "<i class'active'>Demo Balance:</i> 0.00 USD";}else{echo "Demo Balance: $ $demo USD";} ?>
		</span>-->
</p>
</div>
<div class="dashboard-item wow page-set fadeInDown animated" data-wow-delay="0.7s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInDown;">
    <div class="dashboard-item__box setLayerOne">
        <span class="dashboard-item__chart">
					<!-- TradingView Widget BEGIN -->
		<div class="tradingview-widget-container">
		  <div class="tradingview-widget-container__widget"></div>
		  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
		  {
		  "symbol": "COINBASE:BTCUSD",
		  "width": "100%",
		  "height": "100%",
		  "locale": "en",
		  "dateRange": "12M",
		  "colorTheme": "light",
		  "trendLineColor": "rgba(255, 0, 0, 1)",
		  "underLineColor": "rgba(224, 102, 102, 0.3)",
		  "underLineBottomColor": "rgba(41, 98, 255, 0)",
		  "isTransparent": true,
		  "autosize": true,
		  "largeChartUrl": ""
		}
		  </script>
		</div>
		<!-- TradingView Widget END -->
		</span>
    </div>
    <div class="dashboard-item__box setLayerOne">
        <span class="dashboard-item__icon"><img alt="" src="./bitmag_files/1.png"></span>
        <span class="dashboard-item__name"> Bitcoin Wallet</span>
        <p class="dashboard-item__box-mobile">

            <span class="dashboard-item__usd"><?php if($account == 0){echo "0.00";}else{echo $account;}?> USD </span>
        </p>
    </div>
		<div class="dashboard-item__box setLayerTwo">
			<div class="dashboard-item__wallets-info">
				<input type="text" data-copy-val="group1" disabled value="<?php if(empty($btcaccount)){echo "No wallet added";}else{echo $btcaccount;}?>">
				<i class="dashboard-item__wallets-dots">...</i>
				<i class="fas  " data-copy-key="group1"></i>
				<span class="activCopy" data-copy-alert="group1">Copied to clipboard</span>
			</div>
		</div>
    </div>




<div>&nbsp;</div>

<div class="page-set page-set__alert-red wow fadeInDown" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
    <div class=" justify-content-center">
			<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
 <div class="tradingview-widget-container__widget"></div>

 <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
 {
 "width": "100%",
 "height": "100%",
 "currencies": [
	 "EUR",
	 "USD",
	 "JPY",
	 "GBP",
	 "CHF",
	 "AUD",
	 "CAD",
	 "NZD",
	 "CNY",
	 "TRY",
	 "PHP",
	 "AED",
	 "RUB"
 ],
 "isTransparent": true,
 "colorTheme": "dark",
 "locale": "en"
}
 </script>
</div>
<!-- TradingView Widget END -->

    </div>

</div>

<div>&nbsp;</div>






<div id="chart_Main" class="chart"><div><div data-wow-delay="0.3s" data-wow-offset="0" class="dashboard-item page-set wow fadeInDown" style="visibility: hidden; animation-delay: 0.3s; animation-name: none;"><p class="wallets-info"><span class="h5">
                                   Bitcoin Price
                                </span></p></div>
            &nbsp;
                  <div class="row" disabled><!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
  {
  "symbol": "BITSTAMP:BTCUSD",
  "width": "100%",
  "colorTheme": "dark",
  "isTransparent": true,
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END --></div></div></div></div></div></div>







                </div>
            </div>
        </div>

<div class="modal-footer">

</div>
</div>
</div>
</div>

<div id="modal_socket" class="fade modal" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="modal_socket-label">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div id="modalHeader" class="modal-header">
<h5 id="modal_socket-label" class="modal-title"></h5>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <div class="js-message"></div>

</div>
<div class="modal-footer">

</div>
</div>
</div>
</div>

        <div id="app"></div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="" class="logo active wow zoomIn" data-wow-delay="0.2s" data-wow-offset="50" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">                                     <img alt="" src="../img/logo.png" style="width:200px; height:62px;">

                            <span></span>
                        </a>
                    </div>
                    <div class="col-12 text-center">
                        <nav class="navbox wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                            <ul>
                                <li><a href="https://agrocapital-management.com/who-is-osteo-trade.php">About us</a></li>
                                <li><a href="https://agrocapital-management.com/aml-policy.php">Terms and conditions</a></li>
                                <li><a href="https://agrocapital-management.com/help-and-support.php">FAQ</a></li>

                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 text-center">
                        <p class="copy wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                                                        <br>
                            <br>
                            <a href="mailto:support@agrocapital-management.com">support@agrocapital-management.com
    </div>


    <script src="./bitmag_files/vue.min.js.download"></script>
<script src="./bitmag_files/axios.min.js.download"></script>
<script src="./bitmag_files/vue-router.min.js.download"></script>
<script src="./bitmag_files/vuex.min.js.download"></script>
<script src="./bitmag_files/jquery.js.download"></script>
<script src="./bitmag_files/yii.js.download"></script>
<script src="./bitmag_files/vuexstore.js.download"></script>
<script src="./bitmag_files/vuesockets.js.download"></script>
<script src="./bitmag_files/Chart.bundle.min.js.download"></script>
<script src="./bitmag_files/moment-with-locales.js.download"></script>
<script src="./bitmag_files/bootstrap.bundle.js.download"></script>
<script src="./bitmag_files/jquery.plugin.min.js.download"></script>
<script src="./bitmag_files/popper.min.js.download"></script>
<script src="./bitmag_files/script.js.download"></script>
<script src="./bitmag_files/main.js.download"></script>
<script src="./bitmag_files/jquery.countdown.min.js.download"></script>
<script src="./bitmag_files/bootstrap-notify.min.js.download"></script>
<script src="./bitmag_files/jquery.flip.min.js.download"></script>
<script src="./bitmag_files/wow.min.js.download"></script>
<script>jQuery(function ($) {
jQuery('#telegram_two_fa_modal').modal({"show":false});
jQuery('#telegram_disable_modal').modal({"show":false});
jQuery('#modal_socket').modal({"show":false});
});</script>

    <script type="text/javascript">new WOW().init();
        $(document).ready(function () {

            var ClipboardHelper = {

                copyElement: function ($element)
                {
                    this.copyText($element.text())
                },
                copyText:function(text) // Linebreaks with \n
                {

                    var $tempInput =  $("<textarea>");
                    $("body").append($tempInput);
                    $tempInput.val(text).select();
                    document.execCommand("copy");
                    $tempInput.remove();
                }
            };


            setTimeout( function () {
                $('#preloader').hide();
            },200)


            $('.js-popover').on('click',function (e) {
                e.preventDefault();
                e.stopPropagation();
                var $this = $(this);
                $this.popover('show');
                var val = $(this).closest(".js-copyblock").find('.js-copy').val();
                ClipboardHelper.copyText(val);
                $(this)
                setTimeout(function () {
                    $this.popover('hide');
                },2000)
            })

        });
    </script>

    </body></html>
