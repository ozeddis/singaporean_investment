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
            $account = $result['account_id'];
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
	if(isset($_POST['send_btn'])){
		$body = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['body']))));

		require'../phpmailer/PHPMailerAutoload.php';
		$subject = "From Website";
		$mail = new PHPMailer;
		$date78 = Date("Y");
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
		$mail->Subject='Contact:'.$subject;
		$mail->Body='<p> '.$body. '</p> <br><p>© Copyright '.$date78.' Agro Capital Management All rights reserved.</p>';

		if($mail->send()){
			ECHO  "<script type=\"text/javascript\">
						alert(\"Thank you for reaching out to us, we will get back to you soon.\");
						window.location = \"personal-area.php\"
						</script>";
		}else{
			ECHO  "<script type=\"text/javascript\">
						alert(\"Sorry, can not send mail to admin at this time.\");
						window.location = \"personal-area.php\"
						</script>";
		}
	}
?>
<?php
	if(!$_SESSION['user_id']){
		header("location:../login.php");
	}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="csrf-param" content="_csrf-frontend">
		<meta name="csrf-token" content="theqxqjJwBjWkM6hP-G3-NmXUsFNXWaAi5_Fgz9iBG75dJ_20Ii6cuLlvM5uqIWI79Y7ggM-PtXA8qT0fQdWWw==">
        <title>Dashboard | Support</title>
		<meta name="description" content="Magnet, Relax & earn">
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
						<li class="active"><a href="personal_support.php">Support</a></li></ul>
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
                                            <i class="user-pic"><img alt="" src=".//bitmag_files/defavatar.jpg" style="height: 100%;"></i>
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
						<li class=""><a href="deposit.php">
						   <i class="fas  "></i>
							Deposit
						</a></li>
						<li><a href="withdraw.php">
							<i class="fas  - - "></i>
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
						</a></li>
						<li class="active"><a href="personal_support.php">
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
    <div class="col-12 p-2">
            <div data-wow-delay="0.6s" data-wow-offset="0" id="support" class="dashboard-item page-set wow fadeInDown" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;"><div class="wallets-info"><span class="h5">
                                           Support

                                        </span></div>
										<form action="" method="POST">
											<div class="text-set__box support__page">
												<div class="messages">
													<div class="messagesBox">
													</div>
												</div>
												<div class="row">
													<div class="col-12 sm-6 justify-content-center">
															<label>Email</label>
															<div class="col pr-0">
																<div class="fields-box">
																	<input type="email" value="<?php echo $email;?>" disabled name="" placeholder="Email" class="text_message form-control  ">
																</div>
															</div>
															<label>Message</label>
															<div class="col pr-0">
																<div class="fields-box">
																	<input type="text" name="body" placeholder="Type you message......." class="text_message form-control  ">
																</div>
															</div>
															<div class="col-auto pl-0">
																<i class=""><input type="submit" name="send_btn" Value="Send" class="sendbutton fab telegram-plane actionBtn">
															</i>
															</div>
													</div>
												</div>
											</div>
										</form>

<script language=javascript>

function checkform() {

  if (document.mainform.email.value == '') {
    alert("Please enter your e-mail address!");
    document.mainform.email.focus();
    return false;
  }
  if (document.mainform.message.value == '') {
    alert("Please type your message!");
    document.mainform.message.focus();
    return false;
  }
  return true;
}


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


        <div id="app"></div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="logo active wow zoomIn" data-wow-delay="0.2s" data-wow-offset="50" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                               <img alt="" src="../img/logo.png" style="width:200px; height:62px;">

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
