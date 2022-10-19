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
	$sum = 0;
	if(mysqli_num_rows($run_query1) > 0){
		while($result = mysqli_fetch_assoc($run_query1)){
			$trans_id = $result['transaction_id'];

			$pending = "pending";
			$query2 = " SELECT * FROM withdrawal WHERE transaction_id = '{$trans_id}' AND status = '{$pending}'";
			$run_query2 = mysqli_query($connection, $query2);
			while($result = mysqli_fetch_assoc($run_query2)){
				$id = $result['id'];
				$sum += $result['main_money'];
			}
		}
	}

	$des = "ROI";
	$query3 = " SELECT * FROM wallet WHERE description = '{$des}' AND wallet_address = '{$wallet}'";
	$run_query3 = mysqli_query($connection, $query3);
	$tot = 0;
	if(mysqli_num_rows($run_query3) > 0){
		while($result = mysqli_fetch_assoc($run_query3)){
			$user_id = $result['id'];
			$tot += $result['amount'];
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
	if(isset($_POST['spend'])){
		$amount22 = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['amount'])));
		$plan = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['plan'])));
		$type = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['type'])));

		if(!is_numeric($amount22)){
			echo "<script type=\"text/javascript\">
			alert(\"Invalid amount\");
			</script>";
		}else{
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

			require'phpmailer/PHPMailerAutoload.php';
			$date = date("Y-m-d");
			$time = time();
			$time2 = date("H:i:s", $time);
			$date22 = Date("Y-m-d H:i" , $time);
			$account_id14 = "MB Account";
			$account_id2 = "Deposit from account";
			$transaction_id = rand(111111111,999999999);
			$active = "active";
			$pending = "pending";
			$empty = "";
			$image = "approved transaction";
			$times_done = 0;
			$earnings = 0;
      $paid = "debit";
			$start1 = "start";
			$start2 = "no";
			$date78 = date("Y");
	//calculations
		$gain = ($amount22 * $percentage) / 100;
		$commission2 = ($amount22 * $commission) / 100;
		$no_of_times = $no_per_rollover;
		$amount_withdrawal = ($gain * $no_per_rollover) - $commission2;
		$mul = $gain * $no_of_times;
		$amount_per_times = ($mul - $commission2) / $no_of_times;
		$amount_remaining = $gain;
		$main_money = $amount22;
		$amount_earned = ($gain * $no_per_rollover) - $commission2;
		$dura = $duration;
		$amount_withdrawn = 0;
		$pay = $payout;
		$referal_bonus = ($amount22 * $referal_bonus2) / 100;

		if($amount22 < $minimium){
			echo "<script type=\"text/javascript\">
			alert(\"Enter amount greater or equal to $$minimium\");
			window.location = \"deposit.php\"
			</script>";
		}elseif($amount22 > $maximium){
			echo "<script type=\"text/javascript\">
			alert(\"Enter amount equal or less than $$maximium\");
			window.location = \"deposit.php\"
			</script>";
		}else{
			$_SESSION['gain'] = $gain;
			$_SESSION['no_of_times'] = $no_of_times;
			$_SESSION['amount_withdrawal'] = $amount_withdrawal;
			$_SESSION['mul'] = $mul;
			$_SESSION['commission2'] = $commission2;
			$_SESSION['amount_per_times'] = $amount_per_times;
			$_SESSION['amount_remaining'] = $amount_remaining;
			$_SESSION['main_money'] = $main_money;
			$_SESSION['amount_earned'] = $amount_earned;
			$_SESSION['dura'] = $dura;
			$_SESSION['amount_withdrawn'] = $amount_withdrawn;
			$_SESSION['pay'] = $pay;
			$_SESSION['referal_bonus'] = $referal_bonus;
			$_SESSION['plan'] = $plan;

      if($type == "acc"){
        if($account < $amount22){
          echo "<script type=\"text/javascript\">
    			alert(\"Insufficent balance for the selected plan\");
    			window.location = \"deposit.php\"
    			</script>";
        }else{

          $query101 = "INSERT INTO wallet (account_id, wallet_address, amount, status, transaction_id, date, time) VALUES ('{$account_id}', '{$wallet}','{$amount22}', '{$pending}','{$transaction_id}','{$time2}','{$date}')";
          $run_query101 = mysqli_query($connection, $query101);

          $query46 = "INSERT INTO deposits (account_id,amount_deposited,time,date,status,plan,transaction_id,deposit_method,commission,amount_withdrawable,earnings) VALUES ('{$account_id}','{$amount22}','{$time2}','{$date}','{$pending}','{$plan}','{$transaction_id}','{$account_id2}','{$commission2}','{$amount_withdrawal}','{$amount_earned}')";//debit the account
      		$run_query46 = mysqli_query($connection, $query46);
          if($run_query46 == TRUE){
            $debit_id = rand(1111111,9999999);
            $query101 = "INSERT INTO wallet (account_id, wallet_address, amount, status, transaction_id, date, time) VALUES ('{$account_id}', '{$wallet}','{$amount22}', '{$paid}','{$debit_id}','{$time2}','{$date}')";
        		$run_query101 = mysqli_query($connection, $query101);
            if($run_query101 == TRUE){
              $query48 = "INSERT INTO withdrawal (commission,triger,email,payout,earnings,account_id,wallet_address,no_of_times,amount_per_time,transaction_id,amount_remaining,main_money,duration,amount_paid,status,date,times_done) VALUES ('{$commission2}','{$start2}','{$email}','{$pay}','{$times_done}','{$account_id}','{$wallet}','{$no_of_times}','{$amount_per_times}','{$transaction_id}','{$amount_remaining}','{$main_money}','{$dura}','{$amount22}','{$pending}','{$date22}','{$times_done}')";
      				$run_query48 = mysqli_query($connection, $query48);
              if($run_query48 == TRUE){

      					$subject = "Notification";
      					$mail = new PHPMailer;

      					$mail->Host='smtp.namecheap.com';
      					$mail->Port=587;
      					$mail->SMTPAuth=true;
      					$mail->SMTPSecure='tls';
      					$mail->Username='support@agrocapital-management.com';
      					$mail->Password='[1FQxk~H8^Kw]';

      					$mail->setFrom($email, 'Agro Capital Management');
      					$mail->addAddress('support@agrocapital-management.com');
      					$mail->addReplyTo('support@agrocapital-management.com', 'Agro Capital Management');

      					$mail->isHTML(true);
      					$mail->Subject='Payment:'.$subject;
      					$mail->Body='<p> Hello Agro Capital Management, <br> '.$username.' have successfully invested the sum of $'.$amount22.' from their account balance in your platform</p><p>© Copyright '.$date78.' Agro Capital Management All rights reserved.</p>';

      					if($mail->send()){
      						header("location: history.php");
      					}else{
      						$message_failure = "<script type=\"text/javascript\">
      					alert(\"Deposit successful\");
      					window.location = \"history.php\"
      					</script>";

      					}
              }else{
                echo "<script type=\"text/javascript\">
          			alert(\"Mining failed to initiate, Try again\");
          			window.location = \"deposit.php\"
          			</script>";
              }
            }else{
              echo "<script type=\"text/javascript\">
        			alert(\"Failed to debit user\");
        			window.location = \"deposit.php\"
        			</script>";
            }
          }else{
            echo "<script type=\"text/javascript\">
      			alert(\"Internal server error\");
      			window.location = \"deposit.php\"
      			</script>";
          }
        }
      }else{
        $v = $type;
  			$_SESSION['meth'] = $v;
  			header("location: secured-deal.php?id=$v");
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
        <title>Dashboard | Deposit</title>
		<meta name="description" content="Invest, Relax & earn">
        <link href="./bitmag_files/bootstrap.css" rel="stylesheet">
		<link href="./bitmag_files/normalize.css" rel="stylesheet">

<link rel="icon" href="../styles/images/favicon.png">
		<link href="./bitmag_files/opensans.css" rel="stylesheet">
		<link href="./bitmag_files/all.css" rel="stylesheet">
		<link href="./bitmag_files/style.css" rel="stylesheet">
		<link href="./bitmag_files/animate.css" rel="stylesheet">        <link rel="icon" type="image/x-icon" href="../assets/logo1.png" />
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
                        <a href="#personal-area__nav" class="actionBtn actionBtn__outline actionBtn__w100p d-none d-md-none mb-2">Personal Menu <i class="fas  "></i></a>
                        <ul class="personal-area__nav page-set"><li><a href="personal-area.php">
							<i class="fas  "></i>
								Dashboard
						</a></li>
						<li class="active"><a href="deposit.php">
						   <i class="fas  "></i>
							Deposit
						</a></li>
						<li class=" "><a href="withdraw.php">
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
						<li class=" "><a href="settings.php">
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
                <div class="col-12 col-md-8 col-lg-9 col-xl-10  pl-2 wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
                    <div class="row">
    <div class="col-12 col-lg-6 p-2">

        <div class="personal-form page-set">

            <p class="h5">Make a deposit:</p>
            <form id="w0" action="" method="post">

            </form>
        </div>

    </div>
    <div class="col-12 col-lg-6 p-2">

        &nbsp;

    </div>
</div>

<div class="row">
    <div class="col-12 p-2">
<!--
        <div class="dashboard-item page-set wow fadeInDown animated" data-wow-delay="0.6s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">
            <div class="wallets-info">
                                        <span class="h5">
                                            <a href=""><li class="active">Select a plan</li></a>
                                        </span>
            </div>
            <div class="text-set__box">
                                    <div class="main-table all__table">
                        <div class="main-table__row main-table__row-th">
                            <div class="main-table__th">Plans</div>
                            <div class="main-table__th">Amount</div>
                            <div class="main-table__th">Percentage</div>
                            <div class="main-table__th">Duration</div>
                            <div class="main-table__th">Profit</div>
							-->
							<link type="text/css" rel="stylesheet" href="hd_cu stom.css">
							<link type="text/css" rel="stylesheet" href="hdcu stomcss.css">
</div>

</div>


<?php
	if(isset($message)){
		echo $message;
	}
	if(isset($message_failure)){
		echo $message_failure;
	}
?>
<form method="POST" action="">
   Select a plan:<br>
	<div class="container">

	<table cellspacing=1 cellpadding=2 border=0 width=100%><tr>
	<td colspan=3>

	<!--	<inputtype=radioname=h_idvalue='2'>-->

<?php
	$query = "SELECT * FROM plans WHERE id = 1";
	$run_query = mysqli_query($connection,$query);

	if(mysqli_num_rows($run_query) > 0){
	$x = 0;
	while($result = mysqli_fetch_assoc($run_query)){
		$plan = $result['plan'];
		$minimium = $result['minimium'];
		$max = $result['maximium'];
		$id = $result['id'];
		$percentage = $result['percentage'];
		$referal_bonus = $result['referal_bonus'];
		$commission = $result['commission'];
		$duration = $result['duration'];
		$payout = $result['payout'];
		$no_of_times  = $result['no_of_times'];
    if($max > 100000){
      $maximium = "Unlimited";
    }else{
      $maximium = "$\n" . $max;
    }
		echo"
		<input type='radio' name='plan' value='$plan'>
 	<b>$percentage% after $duration</b></td>
</tr><tr>
<td class=inheader>Plan</td>
<td class=inheader width=200>Spent Amount($)</td>
<td class=inheader width=100 nowrap><nobr>Profit(%)</nobr></td>
</tr>

<tr>
<td class=item>$plan</td>
<td class=itemalign=right>$\n$minimium - $maximium</td>
<td class=itemalign=right>$percentage</td>
</tr>
</table><br><br>
<script>
cps[1]=[];
</script>";

		$x++;
	}
}
?>
	<table cellspacing=1 cellpadding=2 border=0 width=100%><tr>
	<td colspan=3>
 	<!--	<inputtype=radioname=h_idvalue='2'>-->

<?php
	$query = "SELECT * FROM plans WHERE id = 2";
	$run_query = mysqli_query($connection,$query);

	if(mysqli_num_rows($run_query) > 0){
	$x = 0;
	while($result = mysqli_fetch_assoc($run_query)){
		$plan = $result['plan'];
		$minimium = $result['minimium'];
		$max = $result['maximium'];
		$id = $result['id'];
		$percentage = $result['percentage'];
		$referal_bonus = $result['referal_bonus'];
		$commission = $result['commission'];
		$duration = $result['duration'];
		$payout = $result['payout'];
		$no_of_times  = $result['no_of_times'];
    if($max > 100000){
      $maximium = "Unlimited";
    }else{
      $maximium = "$\n" . $max;
    }
		echo"
		<input type='radio' name='plan' value='$plan'>
	<b>$percentage% after $duration</b></td>
</tr><tr>
<td class=inheader>Plan</td>
<td class=inheader width=200>Spent Amount($)</td>
<td class=inheader width=100 nowrap><nobr>Profit(%)</nobr></td>
</tr>

<tr>
<td class=item>$plan</td>
<td class=itemalign=right>$\n$minimium - $maximium</td>
<td class=itemalign=right>$percentage</td>
</tr>
</table><br><br>
<script>
cps[1]=[];
</script>";

		$x++;
	}
}
?>

<table cellspacing=1 cellpadding=2 border=0 width=100%><tr>
	<td colspan=3>
 	<!--	<inputtype=radioname=h_idvalue='2'>-->

<?php
	$query = "SELECT * FROM plans WHERE id = 3";
	$run_query = mysqli_query($connection,$query);

	if(mysqli_num_rows($run_query) > 0){
	$x = 0;
	while($result = mysqli_fetch_assoc($run_query)){
		$plan = $result['plan'];
		$minimium = $result['minimium'];
		$max = $result['maximium'];
		$id = $result['id'];
		$percentage = $result['percentage'];
		$referal_bonus = $result['referal_bonus'];
		$commission = $result['commission'];
		$duration = $result['duration'];
		$payout = $result['payout'];
		$no_of_times  = $result['no_of_times'];
    if($max > 100000){
      $maximium = "Unlimited";
    }else{
      $maximium = "$\n" . $max;
    }
		echo"
		<input type='radio' name='plan' value='$plan'>
	<b>$percentage% after $duration</b></td>
</tr><tr>
<td class=inheader>Plan</td>
<td class=inheader width=200>Spent Amount($)</td>
<td class=inheader width=100 nowrap><nobr>Profit(%)</nobr></td>
</tr>

<tr>
<td class=item>$plan</td>
<td class=itemalign=right>$\n$minimium - $maximium</td>
<td class=itemalign=right>$percentage</td>
</tr>
</table><br><br>
<script>
cps[1]=[];
</script>";

		$x++;
	}
}
?>

<table cellspacing=1 cellpadding=2 border=0 width=100%><tr>
	<td colspan=3>
	<!--	<inputtype=radioname=h_idvalue='2'>-->

<?php
	$query = "SELECT * FROM plans WHERE id = 4";
	$run_query = mysqli_query($connection,$query);

	if(mysqli_num_rows($run_query) > 0){
	$x = 0;
	while($result = mysqli_fetch_assoc($run_query)){
		$plan = $result['plan'];
		$minimium = $result['minimium'];
		$max = $result['maximium'];
		$id = $result['id'];
		$percentage = $result['percentage'];
		$referal_bonus = $result['referal_bonus'];
		$commission = $result['commission'];
		$duration = $result['duration'];
		$payout = $result['payout'];
		$no_of_times  = $result['no_of_times'];
    if($max > 100000){
      $maximium = "Unlimited";
    }else{
      $maximium = "$\n" . $max;
    }
		echo"
		<input type='radio' name='plan' value='$plan'>
	<b>$percentage% after $duration</b></td>
</tr><tr>
<td class=inheader>Plan</td>
<td class=inheader width=200>Spent Amount($)</td>
<td class=inheader width=100 nowrap><nobr>Profit(%)</nobr></td>
</tr>

<tr>
<td class=item>$plan</td>
<td class=itemalign=right>$\n$minimium - $maximium</td>
<td class=itemalign=right>$percentage</td>
</tr>
</table><br><br>
<script>
cps[1]=[];
</script>";

		$x++;
	}
}
?>
<table cellspacing=1 cellpadding=2 border=0 width=100%><tr>
	<td colspan=3>
	<!--	<inputtype=radioname=h_idvalue='2'>-->

<?php
	$query = "SELECT * FROM plans WHERE id = 5";
	$run_query = mysqli_query($connection,$query);

	if(mysqli_num_rows($run_query) > 0){
	$x = 0;
	while($result = mysqli_fetch_assoc($run_query)){
		$plan = $result['plan'];
		$minimium = $result['minimium'];
		$max = $result['maximium'];
		$id = $result['id'];
		$percentage = $result['percentage'];
		$referal_bonus = $result['referal_bonus'];
		$commission = $result['commission'];
		$duration = $result['duration'];
		$payout = $result['payout'];
		$no_of_times  = $result['no_of_times'];

    if($max > 100000){
      $maximium = "Unlimited";
    }else{
      $maximium = "$\n" . $max;
    }
		echo"
		<input type='radio' name='plan' value='$plan'>
	<b>$percentage% after $duration</b></td>
</tr><tr>
<td class=inheader>Plan</td>
<td class=inheader width=200>Spent Amount($)</td>
<td class=inheader width=100 nowrap><nobr>Profit(%)</nobr></td>
</tr>

<tr>
<td class=item>$plan</td>
<td class=itemalign=right>$\n$minimium - $maximium</td>
<td class=itemalign=right>$percentage</td>
</tr>
</table><br><br>
<script>
cps[1]=[];
</script>";

		$x++;
	}
}
?>
<table cellspacing=1 cellpadding=2 border=0 width=100%><tr>
	<td colspan=3>
	<!--	<inputtype=radioname=h_idvalue='2'>-->

<?php
	$query = "SELECT * FROM plans WHERE id = 6";
	$run_query = mysqli_query($connection,$query);

	if(mysqli_num_rows($run_query) > 0){
	$x = 0;
	while($result = mysqli_fetch_assoc($run_query)){
		$plan = $result['plan'];
		$minimium = $result['minimium'];
		$max = $result['maximium'];
		$id = $result['id'];
		$percentage = $result['percentage'];
		$referal_bonus = $result['referal_bonus'];
		$commission = $result['commission'];
		$duration = $result['duration'];
		$payout = $result['payout'];
		$no_of_times  = $result['no_of_times'];
    if($max > 100000){
      $maximium = "Unlimited";
    }else{
      $maximium = "$\n" . $max;
    }
		echo"
		<input type='radio' name='plan' value='$plan'>
	<b>$percentage% after $duration</b></td>
</tr><tr>
<td class=inheader>Plan</td>
<td class=inheader width=200>Spent Amount($)</td>
<td class=inheader width=100 nowrap><nobr>Profit(%)</nobr></td>
</tr>

<tr>
<td class=item>$plan</td>
<td class=itemalign=right>$\n$minimium - $maximium</td>
<td class=itemalign=right>$percentage</td>
</tr>
</table><br><br>
<script>
cps[1]=[];
</script>";

		$x++;
	}
}
?>
	<table cellspacing=0 cellpadding=2 border=0>
	<tr>
	 <td>Your account balance:</td>
	 <td align=right><b>$ <?php if($account == 0){echo "0.00";}else{echo $account;}?></td></b>
	</tr>
	<tr><td>&nbsp;</td>
	 <td align=right>
	  <small>
																								   </small>
	 </td>
	</tr>
	<tr>
	 <td><label class="active">Amount to Spend ($):</label></td>
	 <td align=right><input type=text name="amount" value='' class="inpts form-control" size=15 style="text-align:right;" required></td>
	</tr>

	<tr>
	  <td colspan=2>
	   <table cellspacing=0 cellpadding=2 border=0>
			<tr>
		 <td><input type="radio" name="type" value="bitcoin" required></td>
		 <td>Spend funds from Bitcoin</td>
		</tr>
		<tr>
			<td><input type="radio" name="type" value="usdttrc20" required></td>
  	<td>Spend funds from USDT (TRC 20)</td>
    </tr>
    <tr>
			<td><input type="radio" name="type" value="trx" required></td>
  	<td>Spend funds from Tron</td>
    </tr>
    <tr>
      <td>
        <input type="radio" name="type" value="acc" required>
        <td>Spend from account balance</td>
      </td>
    </tr>
	   </table>
	  </td>
	</tr>
	<tr>
	 <td colspan=2>
	 <input type=submit value="Spend" class="actionBtn" name="spend"></td>
	</tr></table>
	</form>

	<script language=javascript>
	for (i = 0; i<document.spendform.type.length; i++) {
	  if ((document.spendform.type[i].value.match(/^process_/))) {
		document.spendform.type[i].checked = true;
		break;
	  }
	}
	updateCompound();
	</script>
</div>
					<!-- "</div>
                            <div class='main-table__row'>
                                <div class='main-table__td'>
                                    <span>$plan</span>
                                    <li class='main-table__date'>Minimum $minimium </li>
                                </div>
                                <div class='main-table__td'>
                                    <span>Amount</span>
                                    <span>200.1</span>
                                </div>
                                <div class='main-table__td'>
                                    <span>Percentage</span>
                                    <span>110%</span>
                                </div>

								<div class='main-table__td'>
                                    <span>Duration</span>
                                    <span></span>

                                </div>
								<div class='main-table__td'>
                                    <span>Profit</span>
                                    <span></span>
                                </div>
                                <!--<div class='main-table__td'>
                                    <span>Address</span>
                                    <span class='fields-box'>
                                        <div class='dashboard-item__wallets-info'>
                                            <input type='text' data-copy-val='group199706' value='3GnyU4JFtEG8jea3tVKEhHgNqxteVcf8cU'>
                                            <i class='dashboard-item__wallets-dots'>...</i>
                                            <i class='fas copy' data-copy-key='group199706'></i>
                                            <span class='activCopy' data-copy-alert='group199706'>Copied...</span>
                                        </div>
                                    </span>
                                </div>


                                <div class='main-table__td'>
                                    <span>Status</span>
                                    <span><div class='text-danger'><i class='fa ban'></i> Failed</div></span>
                                </div>-->
                            </div>
                    </div>
            </div>
        </div>

    </div>
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


<div id="telegram_two_fa_modal" class="fade modal" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="telegram_two_fa_modal-label">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div id="modalHeader" class="modal-header">
<h5 id="telegram_two_fa_modal-label" class="modal-title">Enable Telegram 2fa</h5>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-footer">

</div>
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
                        <a href="personal-area.php" class="logo active wow zoomIn" data-wow-delay="0.2s" data-wow-offset="50" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                             <img alt="" src="../img/logo.png" style="width:200px; height:62px;">

                            <span></span>
                        </a>
                    </div>
                    <div class="col-12 text-center">
                        <nav class="navbox wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                            <ul>
                                <li><a href="../about-us.php">About- us</a></li>
                                <li><a href="https://agrocapital-management.com/aml-policy.php">Terms and conditions</a></li>
                                <li><a href="https://agrocapital-management.com/help-and-support.php">FAQ</a></li>

                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 text-center">
                        <!--<p class="copy wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                                                        --><br>
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
<script src="./bitmag_files/yii.validation.js.download"></script>
<script src="./bitmag_files/yii.activeForm.js.download"></script>
<script src="./bitmag_files/select2.full.min.js.download"></script>
<script src="./bitmag_files/select2-krajee.min.js.download"></script>
<script src="./bitmag_files/kv-widgets.min.js.download"></script>
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
if (jQuery('#deposithistory-wallet_type').data('select2')) { jQuery('#deposithistory-wallet_type').select2('destroy'); }
jQuery.when(jQuery('#deposithistory-wallet_type').select2(select2_33ae08b0)).done(initS2Loading('deposithistory-wallet_type','s2options_e9bc2761'));

if (jQuery('#deposithistory-amount').data('numberControl')) { jQuery('#deposithistory-amount').numberControl('destroy'); }
jQuery('#deposithistory-amount').numberControl(numberControl_da3a513b);

jQuery('#w0').yiiActiveForm([{"id":"deposithistory-wallet_type","name":"wallet_type","container":".field-deposithistory-wallet_type","input":"#deposithistory-wallet_type","enableAjaxValidation":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Wallet Type cannot be blank."});yii.validation.number(value, messages, {"pattern":/^\s*[+-]?\d+\s*$/,"message":"Wallet Type must be an integer.","skipOnEmpty":1});}},{"id":"deposithistory-amount","name":"amount","container":".field-deposithistory-amount","input":"#deposithistory-amount","enableAjaxValidation":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Amount cannot be blank."});yii.validation.number(value, messages, {"pattern":/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/,"message":"Amount must be a number.","min":0.01,"tooSmall":"Amount must be no less than 0.01","skipOnEmpty":1});}}], []);
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
