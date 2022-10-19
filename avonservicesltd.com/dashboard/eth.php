<?php
 	require"../include/server.inc.php";
?>

<?php
	$query = " SELECT * FROM registration WHERE id = '{$_SESSION['user_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$username = $result['username'];
			$account_id = $result['account_id'];
			$email = $result['email'];
			$code = $result['referal'];
			$wallet = $result['wallet'];
			$reg_date = $result['reg_date'];
			$who_refered = $result['who_refered'];
			$btcaccount = $result['btcaccount'];
			$last_login = $result['last_login'];
		}
	}

	$query = " SELECT * FROM registration WHERE account_id = '{$who_refered}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) > 0){
		while($result = mysqli_fetch_assoc($run_query)){
			$username_reference = $result['account_id'];
			$wallet_number_who = $result['wallet'];
		}
	}else{
		$username_reference = "None";
		$wallet_number_who = "None";
	}

	$gain = $_SESSION['gain'];
	$no_of_times = $_SESSION['no_of_times'];
	$amount_withdrawal = $_SESSION['amount_withdrawal'];
	$mul = $_SESSION['mul'];
	$commission2 = $_SESSION['commission2'];
	$amount_per_times = $_SESSION['amount_per_times'];
	$amount_remaining = $_SESSION['amount_remaining'];
	$main_money = $_SESSION['main_money'];
	$amount_earned = $_SESSION['amount_earned'];
	$dura = $_SESSION['dura'];
	$amount_withdrawn = $_SESSION['amount_withdrawn'];
	$pay = $_SESSION['pay'];
	$referal_bonus = $_SESSION['referal_bonus'];
	$plan = $_SESSION['plan'];
	$url = "https://www.blockchain.info/de/ticker";
	$json = file_get_contents($url);
	$data = json_decode($json, TRUE);
	$rate = $data["USD"]["15m"];
	$symbol = $data["USD"]["symbol"];
	$bit_rate = $main_money / $rate;

	$query = " SELECT * FROM plans WHERE plan = '{$plan}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$id = $result['id'];
			$plan = $result['plan'];
			$minimium = $result['minimium'];
			$maximium = $result['maximium'];
			$percentage = $result['percentage'];
			$referal_bonus2 = $result['referal_bonus'];
			$commission = $result['commission'];
			$duration = $result['duration'];
			$payout = $result['payout'];
			$no_per_rollover = $result['no_of_times'];
		}
	}

	if(ISSET($_POST['save'])){
		require'../phpmailer/PHPMailerAutoload.php';
		$date = date("Y-m-d");
		$amount22 = $main_money;
		$time = time();
		$time2 = date("H:i:s", $time);
		$date22 = Date("Y-m-d H:i" , $time);
		$account_id = "MB Account";
		$account_id2 = "Manual Deposit";
		$transaction_id = rand(100000000,999999999);
		$active = "active";
		$pending = "pending";
		$empty = "";
		$image = "approved transaction";
		$times_done = 0;
		$start1 = "start";
		$start2 = "no";
		$date78 = date("Y");
		$pay_to = "0x0dA1DDb253eb39b39445781AD3DB5aD6647e3D04";

		$query101 = "INSERT INTO wallet (account_id, wallet_address, amount, transaction_id) VALUES ('{$account_id}', '{$wallet}','{$amount22}', '{$transaction_id}')";
		$run_query101 = mysqli_query($connection, $query101);

		$query46 = "INSERT INTO deposits (account_id,amount_deposited,time,date,status,plan,transaction_id,deposit_method,commission,amount_withdrawable,earnings) VALUES ('{$account_id}','{$amount22}','{$time2}','{$date}','{$pending}','{$plan}','{$transaction_id}','{$account_id2}','{$commission2}','{$amount_withdrawal}','{$amount_earned}')";//debit the account
		$run_query46 = mysqli_query($connection, $query46);

		if($run_query46 == true){
			$query47 = "INSERT INTO referal_withdrawal (wallet_address,amount,status,account_id,transaction_id) VALUES ('{$wallet_number_who}','{$referal_bonus}','{$empty}','{$username_reference}','{$transaction_id}')";//debit the account
			$run_query47 = mysqli_query($connection, $query47);

			if($run_query47 == true){
				$query48 = "INSERT INTO withdrawal (commission,triger,email,payout,earnings,account_id,wallet_address,no_of_times,amount_per_time,transaction_id,amount_remaining,main_money,duration,amount_paid,status,date,times_done) VALUES ('{$commission2}','{$start2}','{$email}','{$pay}','{$times_done}','{$account_id}','{$wallet}','{$no_of_times}','{$amount_per_times}','{$transaction_id}','{$amount_remaining}','{$main_money}','{$dura}','{$amount22}','{$pending}','{$date22}','{$times_done}')";//debit the account
				$run_query48 = mysqli_query($connection, $query48);

				if($run_query48 == true){
					$subject = "Notification";
					$mail = new PHPMailer;

					$mail->Host='smtp.namecheap.com';
					$mail->Port=587;
					$mail->SMTPAuth=true;
					$mail->SMTPSecure='tls';
					$mail->Username='support@agrocapital-management.com';
					$mail->Password='[1FQxk~H8^Kw]';

					$mail->setFrom($email, 'Xoptions Investments');
					$mail->addAddress('support@agrocapital-management.com');
					$mail->addReplyTo('support@agrocapital-management.com', 'Xoptions Investments');

					$mail->isHTML(true);
					$mail->Subject='Payment:'.$subject;
					$mail->Body='<p> Hello Xoptions Investments, <br> '.$username.' have successfully invested the sum of $'.$amount22.' in your platform</p><p>© Copyright '.$date78.' Xoptions Investments All rights reserved.</p>';

					if($mail->send()){
						header("location: history.php");
					}else{
						$message_failure = "<script type=\"text/javascript\">
					alert(\"Deposit successful\");
					window.location = \"history.php\"
					</script>";

					}
				}else{
					$message_failure = "could not keep withdrawal record of this transaction";
				}
			}else{
				$message_failure = "Could not make referal deposit";
			}
		}else{
			$message_failure = "Could not deposit this fund for your investment try again later";
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
        <title>Dashboard | Deal</title>
		<meta name="description" content="Invest, Relax & earn">
        <link href="./bitmag_files/bootstrap.css" rel="stylesheet">
		<link href="./bitmag_files/normalize.css" rel="stylesheet">
		<link href="./bitmag_files/opensans.css" rel="stylesheet">
		<link href="./bitmag_files/all.css" rel="stylesheet">
		<link href="./bitmag_files/style.css" rel="stylesheet">
		<link href="./bitmag_files/animate.css" rel="stylesheet">        <link rel="icon" type="image/x-icon" href="../assets/logo1.png" />
							<link type="text/css" rel="stylesheet" href="personal_area/hd_custom.css">
							<link type="text/css" rel="stylesheet" href="hd customcss.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-">

        <!-- The below script Makes IE understand the new html5 tags are there and applies our CSS to it -->
        <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->

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
z<div id="google_translate_element"></div>

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

                            <span>Xoptions Investments</span>
                                </a>
                            </div>
                            <div class="header-panek__right text-right">
                                <nav class="navbox">
                                                                        <ul><li><a href="../index.php">Home</a></li>
						<li class=""><a href="personal-area.php">Personal Area</a></li>
						<li><a href="personal_support.php">Support</a></li></ul>
                                </nav>
                                                                <!--UserBtn-->
                                <div class="d-inline-block">

                                        <nav class="usernav text-left">
                                            <ul>
                                                <li><a href="personal-area.php"><i class="fas  "></i> Personal Area</a></li>
                                                <li><a href="settings.php"><i class="fas  "></i> Settings</a></li>
                                                <li><a href="logout.php"><i class="fas "></i> Log out</a></li>
                                            </ul>
                                        </nav>
                                        <a href="#profileNav" class="actionBtn actionBtn__nobg actionBtn__icon profileBtn">
                                            <i class="user-pic"><img alt="" src="./bitmag_files/defavatar.jpg" style="height: 100%;"></i>
                                            <span><?php echo $username;?></span>
                                            <i class="fas  - "></i>
                                        </a>

                                </div>
                                <!--/-->
                                                                <!--/UserBtn-->
                                <a href="#navMobile" class="actionBtn actionBtn__outline actionBtn__icon">
                                    <i class="fas  ">=</i>
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
                        <a href="#personal-area__nav" class="actionBtn actionBtn__outline actionBtn__w100p d-none d-md-none mb-2">Personal Menu <i class="fas bars"></i></a>
                        <ul class="personal-area__nav page-set"><li><a href="personal-area.php">
							<i class="fas  "></i>
								Dashboard
						</a></li>
						<li class=""><a href="deposit.php">
						   <i class="fas  "></i>
							Deposit
						</a></li>
						<li><a href="withdraw.php">
							<i class="fas    "></i>
							Withdraw
						</a></li>
						<li><a href="history.php">
						   <i class="fas  "></i>
							History
						</a></li>
						<li><a href="referals.php">
						   <i class="fas  "></i>
							Referals
						</a></li>
						<li class=""><a href="settings.php">
						   <i class="fas  "></i>
							Profile
						</a></li><li class=""><a href="personal_support.php">
						   <i class="fas  "></i>
							Support
						</a></li><li class=""><a href="logout.php">
						   <i class="fas  "></i>
							Logout
						</a></li></ul>
                    </div>

                </div>
                <div class="col-12 col-md-8 col-lg-9 col-xl-10  pl-2 wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">

                    <div class="personal-form page-set">
    <div class="h5">Secured deal</div>

    <?php
		if(isset($message_failure)){
			echo $message_failure;
		}
	?>
        <div class="text-set__box">
            <div class="hddash_content">

					<div class="hdcont">
<?php $pay_to = "0x0dA1DDb253eb39b39445781AD3DB5aD6647e3D04";?>
<h3>PLEASE CONFIRM YOUR DEPOSIT:</h3>
<br><br>
<div class="amk_left">
<h1>Steps to make a deposit:</h1>
<p>1. Copy the Company Etherum wallet address below</p>
&nbsp;
<p>2. Click on the Save button below.</p>
&nbsp;
<p>3. Then go to your Etherum wallet, and pay the exact amount you saved</p>
&nbsp;
<p>into our Etherum wallet address which you earlier copied.</p>
&nbsp;
<p><b>Please do not click the Save button twice and do not click it if you know you are not ready to make payment. This might attract a penalty.</b></p><br>
<p><b>Etherum wallet:<?php echo $pay_to;?></b></p><br>
</div>
<form action = "" method="POST">
<table cellspacing=0 cellpadding=2 class="form deposit_confirm">
<tr>
 <th>Plan:</th>
 <td><?php echo $percentage;?>% after
 <?php
 if($duration == "1 day"){
	 echo "24 Hours";
 }else if($duration == "3 days"){
	 echo "72 Hours";
 }else if($duration == "7 days"){
	echo "168 Hours";
 }else if($duration == "15 days"){
	echo "360 Hours";
 }else{
	ECHO "NULL";
 }
 ?></td>
 <td rowspan=6><img id=coin_payment_image src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=etherum:<?php echo $pay_to;?>?amount=<?php echo $main_money?>"/></td>
</tr>
<tr>
 <th>Profit:</th>
 <td>$ <?php echo $gain;?> after
 <?php
 if($duration == "1 day"){
	 echo "24 Hours";
 }else if($duration == "3 days"){
	 echo "72 Hours";
 }else if($duration == "7 days"){
	echo "168 Hours";
 }else if($duration == "15 days"){
	echo "360 Hours";
 }else{
	ECHO "NULL";
 }
 ?></td>
</tr>
<tr>
 <th>Principal Return:</th>
 <td>No (included in profit)</td>
</tr>
<tr>
 <th>Principal Withdraw:</th>
 <td>
Not available </td>
</tr>


<tr>
 <th>Credit Amount:</th>
 <td>$ <?php echo $main_money + $gain;?></td>
</tr>
<tr>
 <th>Deposit Fee:</th>
 <td>0.00% + $0.00 (min. $0.00 max. $0.00)</td>
</tr>
<tr>
 <th>Debit Amount:</th>
 <td>$ <?php echo $main_money;?></td>
</tr>
<tr>
 <th>BTC Debit Amount:</th>
 <td><?php echo $bit_rate;?></td>
</tr>
<tr>
 <th><input type="submit" class="actionBtn actionBtn__200" name="save" value="SAVE"></th>
 <td></td>
</tr>
</table>
</form>


<div class="btc_form btc1" id=btc_form>Please send exactly <b><?php echo $bit_rate?></b> to <i><a href="bitcoin:<?php echo $pay_to;?>?amount=<?php echo $bit_rate;?>&message=Deposit+to+stocksrover.com+User+<?php echo $username?>"><?php echo $pay_to;?></a></i><br></div><div id=placeforstatus></div><iframe width=1 height=1 frameBorder=0 id=deposit_result_div src="../index.php/status/postback/48/post_func/1/get_status/1/wallet/1Hk9eHdDbAd57DaYDBDZ4Nq4L94XzAAeM7/amount/0.00128828/token/140_30c398c3d47304d1bc46fd5ddb186e41"></iframe>

</div>

				</div>
			</div>
       <!-- </div>
        <div class="fields-box">
            <input type="submit" name="save" value="Confirm" class="actionBtn actionBtn__200">
        </div>-->

</div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col p-3">&nbsp;</div>
            </div>
            <div></div>
        </div>


    </main>


          <div id="app"></div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="header-panek__left">
                                <a href="#" class="logo active">
                                     <img alt="" src="../img/logo.png" style="width:200px; height:62px;">

                            <span>Xoptions Investments</span>
                                </a>
                            </div>
                    </div>
                    <div class="col-12 text-center">
                        <nav class="navbox wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                            <ul>
                                <li><a href="https://agrocapital-management.com/who-is-osteo-trade.php">About- us</a></li>
                                <li><a href="https://agrocapital-management.com/aml-policy.php">Terms and conditions</a></li>
                                <li><a href="https://agrocapital-management.com/help-and-support.phpp">FAQ</a></li>

                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 text-center">
                        <p class="copy wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                                                        <br>
                            <br>
                            <a href="mailto:support@agrocapital-management.com">support@agrocapital-management.com</a>
                        </p>
                    </div>
                    <div class="col-12 p-2">&nbsp;</div>
                </div>
            </div>
        </footer>
    </div>



      <script src="./bitmag_files/jquery.js.download"></script>
<script src="./bitmag_files/yii.js.download"></script>
<script src="./bitmag_files/select2.full.min.js.download"></script>
<script src="./bitmag_files/select2-krajee.min.js.download"></script>
<script src="./bitmag_files/kv-widgets.min.js.download"></script>
<script src="./bitmag_files/yii.validation.js.download"></script>
<script src="./bitmag_files/jquery.inputmask.bundle.js.download"></script>
<script src="./bitmag_files/number.min.js.download"></script>
<script src="./bitmag_files/yii.activeForm.js.download"></script>
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
