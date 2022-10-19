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
?>

<?php
  $sum = 0;
	$query221 = " SELECT * FROM registration WHERE who_refered = '{$username}'";
	$run_query221 = mysqli_query($connection, $query221);
	$num = mysqli_num_rows($run_query221);
	if(mysqli_num_rows($run_query221) > 0){
		while($result = mysqli_fetch_assoc($run_query221)){
			$user_id = $result['id'];
			$downline = $result['username'];
			$email = $result['email'];
			$reg_date = $result['reg_date'];
			$reg_time = $result['reg_time'];
		}
	}

	$query22 = " SELECT * FROM referal_withdrawal WHERE account_id = '{$username}'";
	$run_query22 = mysqli_query($connection, $query22);
	if(mysqli_num_rows($run_query22) > 0){
		while($result = mysqli_fetch_assoc($run_query22)){
			$sum += $result['amount'];

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
        <title>Dashboard | Referals</title>
        <link href="./bitmag_files/bootstrap.css" rel="stylesheet">
		<link href="./bitmag_files/normalize.css" rel="stylesheet">
		<link href="./bitmag_files/opensans.css" rel="stylesheet">
		<link href="./bitmag_files/all.css" rel="stylesheet">
		<link href="./bitmag_files/style.css" rel="stylesheet">
		<link href="./bitmag_files/animate.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="../assets/logo1.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-">

        <!-- The below script Makes IE understand the new html5 tags are there and applies our CSS to it -->
        <!--[if IE]> <![endif]-->
        <script src="https://cdnjs.cloudflare.ltd/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>


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
                                            <span><?php echo $username; ?></span>
                                            <i class="fas    "></i>
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

                    <div class="personal-areal__box wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <a href="#personal-area__nav" class="actionBtn actionBtn__outline actionBtn__w100p d-none d-md-none mb-2">Personal Menu <i class="fas  "></i></a>
                        <ul class="personal-area__nav page-set"><li><a href="personal-area.php">
							<i class="fas  "></i>
								Dashboard
						</a></li>
						<li class=""><a href="deposit.php">
						   <i class="fas  "></i>
							Deposit
						</a></li>
						<li><a href="withdraw.php">
							<i class="fas  - - "></i>
							Withdraw
						</a></li>
						<li class=" "><a href="history.php">
						   <i class="fas  "></i>
							History
						</a></li>
						<li class="active"><a href="referals.php">
						   <i class="fas  "></i>
							Referals
						</a></li>
						<li class=""><a href="settings.php">
						   <i class="fas  "></i>
							Profile
						</a></li>
						<li class=" "><a href="personal_support.php">
						   <i class="fas  "></i>
							Support
						</a></li>
						<li class=""><a href="logout.php">
						   <i class="fas  "></i>
							Logout
						</a></li></ul>
                    </div>

                </div>
                <div class="col-12 col-md-8 col-lg-9 col-xl-10  pl-2 wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">

                    <div class="row">
    <div class="col-12 p-2">

        <div class="dashboard-item page-set wow fadeInDown" data-wow-delay="0.6s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">
            <div class="wallets-info">
                                        <span class="h5">
                                           Referals
                                        </span>
            </div>
            <div class="text-set__box">
    <table width=300 cellspacing=1 cellpadding=1>
<tr>
  <td class=item>Referrals:</td>
  <td class=item><?php echo $num;?></td>
</tr><tr>
  <td class=item>Active referrals:</td>
  <td class=item><?php echo $num;?></td>
</tr><tr>
  <td class=item>Total referral commission:</td>
  <td class=item>$<?php echo "\n" .$sum;?></td>
</tr>
</table>




<h1 style="font-weight:bold;font-size:50px;color:#fff;" class="important!" >Referal Link <h4 class=" important!"><br>https://agrocapital-management.com/register.php?ref=<?php echo $account_id;?></h1><br></h4
The best internet investment platfrom<br>
Earn a XXX% daily profit!

<br><br>
<div class="dashboard-item__box setLayerTwo">
			<div class="dashboard-item__wallets-info" style="width:450px;">
				<input type="text" data-copy-val="group1"  contentEditable="false" readonly value="https://agrocapital-management.com/register.php?ref=<?php echo $account_id;?>">
				<i class="dashboard-item__wallets-dots">...</i>
				<i class="fas  " data-copy-key="group1"></i>
				<span class="activCopy" data-copy-alert="group1">Copied to clipboard</span>
			</div>
		</div>

</textarea><br><br><br>  <script src="./bitmag_files/jquery.js.download"></script>
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
</body>
</html>
