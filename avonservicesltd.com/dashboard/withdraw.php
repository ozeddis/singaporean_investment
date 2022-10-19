<?php
 	require"../include/server.inc.php";
?>
<?php
	$credit = "credit";
	$debit = "debit";
	$active = "active";
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


	$pending = "pending";
	$query22 = " SELECT * FROM withdraw_from_wallet WHERE account_id = '{$account_id}' AND status = '{$pending}'";
	$run_query22 = mysqli_query($connection, $query22);
	$tot_pend = 0;
	while($result = mysqli_fetch_assoc($run_query22)){
		$tot_pend += $result['amount'];
	}

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
<?php
	if(isset($_POST['withdrawBTN'])){
		$amount22 = strtoupper(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['amount']))));
		$metod = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['metod']))));
		$btcaccount = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['blord']))));

		if($btcaccount == ""){
			$message_failure = "<div class='alert alert-info' style='text-align:center'><strong>Add Bitcoin wallet to process withdrawal</strong></div>";
		}elseif(!is_numeric($amount22)){
			echo "<script type=\"text/javascript\">
				alert(\"Invalid withdrawal amount\");
			</script>";
		}elseif($metod == "0"){
			$message_failure = "<div class='alert alert-info' style='text-align:center'><strong>Select a Withdrawal method</strong></div>";
		}else{

		$credit = "credit";
		$debit = "debit";
		$pending = "pending";
		$transaction_id = rand(10000000,99999999);
		$date = Date("Y-m-d");
		$time = time();
		$time2 = Date("H:i:s", $time);

		$date78 = date('Y');

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

		if($amount22 > $account){
			$message_failure = "<div class='alert alert-danger'>Requested withdrawal is above the funds withdrawable in your account</div>";
		}else{
			$query = "INSERT INTO withdraw_from_wallet (username, amount, wallet_address, crypto, status, account_id, mb_wallet,transaction_id,date,time) VALUES ('{$username}','{$amount22}','{$btcaccount}','{$metod}','{$pending}','{$account_id}','{$wallet}','{$transaction_id}','{$date}','{$time2}')";
			$run_query = mysqli_query($connection, $query);

			if($run_query == true){
				$subject = "Notification";
				require'../phpmailer/PHPMailerAutoload.php';
				$mail = new PHPMailer;

				$mail->Host='smtp.namecheap.com';
				$mail->Port=587;
				$mail->SMTPAuth=true;
				$mail->SMTPSecure='tls';
				$mail->Username='support@agrocapital-management.com';
				$mail->Password='[1FQxk~H8^Kw]';

				$mail->setFrom('.$username.', 'Agro Capital Management');
				$mail->addAddress('support@agrocapital-management.com');
				$mail->addReplyTo('support@agrocapital-management.com', 'Agro Capital Management');

				$mail->isHTML(true);
				$mail->Subject='Withdrawal:'.$subject;
				$mail->Body='<h2> Hello Agro Capital Management,</h2><p>You have a Withdrawal request of '.$amount22.' from '.$username.'</p><p>© Copyright '.$date78.' Agro Capital Management All rights reserved.</p>';

				if($mail->send()){
					$message = "<script type=\"text/javascript\">
					alert(\"Your Transaction will be approved shortly\");
					window.location = \"history.php\"
					</script>";
				}else{
					$message_failure = "<div class='alert alert-danger' style='text-align:center'><strong>You cannot withdraw at the moment try again later</strong></div>";
				}
		}

			}
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
        <title>Dashboard | Withdraw</title>
		<meta name="description" content="Invest, Relax & earn">
        <link href="./bitmag_files/bootstrap.css" rel="stylesheet">
		<link href="./bitmag_files/normalize.css" rel="stylesheet">
		<link href="./bitmag_files/opensans.css" rel="stylesheet">
		<link href="./bitmag_files/all.css" rel="stylesheet">
		<link rel="icon" href="../styles/images/favicon.png">

		<link href="./bitmag_files/style.css" rel="stylesheet">
		<link href="./bitmag_files/animate.css" rel="stylesheet">
		<link rel="icon" type="image/x-icon" href="../assets/logo1.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-">

        <!-- The below script Makes IE understand the new html5 tags are there and applies our CSS to it -->
        <!--[if IE]>
        <script src="https://cdnjs.cloudflare.ltd/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->

<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.ltd/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->



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
                                                                        <ul><li><a href="../../index.php">Home</a></li>
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
                                            <span><?php echo $username; ?></span>
                                            <i class="fas "></i>
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
						<li class="active"><a href="withdraw.php">
							<i class="fas   "></i>
							Withdraw
						</a></li>
						<li ><a href="history.php">
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
                    <div class="row">
    <div class="col-12 col-lg-6 p-2">

<?php
	if(isset($message)){
		echo "<p class='text-center' style='color:green;font-weight:bold;text-align:center;'>{$message}</p>";
	}
	if(isset($message_failure)){
		echo "<p class='text-center' style='color:red;font-weight:bold;text-align:center;'>{$message_failure}</p>";
	}
?>
        <div class="personal-form page-set">
            <p class="h5">Currency</p>

						<form id="w0" action="" method="POST">
			<input type="hidden" name="_csrf-frontend" value="vw18hTHXdnvhaifyw4rb87twgfawubfcyaw4rbtvakwoiuytredswdfghjhgjfgiuykHbUm67PPEIxRnHg==">
						<div class="form-group fields-box field-history-wallet_type required" style="text-align:left;">
			<label class="control-label" for="history-wallet_type"><i class="fas  "></i> From</label>
			<select id="history-wallet_type" class="form-control select2-hidden-accessible" name="History[wallet_type]" aria-required="true" data-s2-options="s2options_e9bc2761" data-krajee-select2="select2_33ae08b0" style="display:none" tabindex="-1" aria-hidden="true">
			<option value="1" selected="">Bitcoin</option>
			<option value="1" selected="">Etherum</option>
			</select><span class="select2 select2-container select2-container--krajee-bs4" dir="ltr" style="width: auto;">
			<span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-history-wallet_type-container"><span class="select2-selection__rendered" id="select2-history-wallet_type-container" title="Bitcoin">
			<div style="margin-right: 5px; width:20px; display: inline-block; text-align: center"><img class="flag" style="max-width: 20px; max-height: 20px" src="./bitmag_files/1.png"></div>Bitcoin</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
<table cellspacing=0 cellpadding=2 border=0>
<tr>
 <td>Account Balance:</td>
 <td>$<b><?php if($account == 0){echo "0.00";}else{echo $account;}?></b></td>
</tr>
<tr>
 <td>Pending Withdrawals: </td>
 <td>$<b><?php if($tot_pend == 0){echo "0.00";}else{echo $tot_pend;}?></b></td>
</tr>
</table>
			<div class="help-block"></div>
			</div>            <div class="row">
							<div class="col-6">
								<div class="form-group fields-box field-history-amount required">
			<label class="control-label" for="history-amount"><i class="fas  - - "></i> Amount</label>
			<input type="text" required   class="form-control  " name="amount" placeholder="0.00" style="text-align: right; " required>
			<div style="display:none"> </div>

			<div class="help-block"></div>
			</div>                </div>
							<div class="col-6">
								<div class="form-group fields-box field-history-address required">
			<label class="control-label" for="history-address"><i class="fas  "></i> Address</label>
			<input type="text"  Value="<?php if($btcaccount == NULL){
				echo "";
			} echo $btcaccount?>" id="history-address" size="68px" class="form-control  " name="blord" aria-required="true">
			<div class="help-block"></div>

			</div>

			<div class="form-group fields-box field-history-amount required">
			<select class="form-control" name="metod">
				<option value="0">Select Withdrawal method</option>
				<?php
					$query = "SELECT * FROM wallets";
					$run_query = mysqli_query($connection, $query);
					if(mysqli_num_rows($run_query)>0){
						while($result = mysqli_fetch_assoc($run_query)){
							$crypto = $result['crypto'];
							echo "<option value='$crypto'>$crypto</option>";
						}
					}
				?>
			</select>
			<div class="help-block"></div>

			</div>
		</div>
						</div>



						<div class="form-group">
							<input type="submit" name="withdrawBTN" value='Withdraw' class="actionBtn actionBtn__w100p">           </div>

            </form>
        </div>

    </div>

</div>
        <div id="app"></div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="personal-area.php" class="logo active wow zoomIn" data-wow-delay="0.2s" data-wow-offset="50" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
						<img alt="" src="../img/logo.png" style="width:200px; height:62px;">

                            <span></span>
                        </a>
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
jQuery&&jQuery.pjax&&(jQuery.pjax.defaults.maxCacheLength=0);
if (jQuery('#history-wallet_type').data('select2')) { jQuery('#history-wallet_type').select2('destroy'); }
jQuery.when(jQuery('#history-wallet_type').select2(select2_33ae08b0)).done(initS2Loading('history-wallet_type','s2options_e9bc2761'));

if (jQuery('#history-amount').data('numberControl')) { jQuery('#history-amount').numberControl('destroy'); }
jQuery('#history-amount').numberControl(numberControl_96306d9e);

jQuery('#w0').yiiActiveForm([{"id":"history-wallet_type","name":"wallet_type","container":".field-history-wallet_type","input":"#history-wallet_type","enableAjaxValidation":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Wallet Type cannot be blank."});yii.validation.number(value, messages, {"pattern":/^\s*[+-]?\d+\s*$/,"message":"Wallet Type must be an integer.","skipOnEmpty":1});}},{"id":"history-amount","name":"amount","container":".field-history-amount","input":"#history-amount","enableAjaxValidation":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Amount cannot be blank."});yii.validation.number(value, messages, {"pattern":/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/,"message":"Amount must be a number.","min":0.01,"tooSmall":"Amount must be no less than 0.01","skipOnEmpty":1});}},{"id":"history-address","name":"address","container":".field-history-address","input":"#history-address","enableAjaxValidation":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Address cannot be blank."});yii.validation.string(value, messages, {"message":"Address must be a string.","max":255,"tooLong":"Address should contain at most 255 characters.","skipOnEmpty":1});}}], []);
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
