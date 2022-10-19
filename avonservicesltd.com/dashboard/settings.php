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
			$email = $result['email'];
			$code = $result['referal'];
			$wallet = $result['wallet'];
			$reg_date = $result['reg_date'];
			$who_refered = $result['who_refered'];
			$btcaccount = $result['btcaccount'];
			$last_login = $result['last_login'];
			$pics = $result['profile_picture'];
		}
	}
?>

<?php

    // Check if image file is a actual image or fake image
    if(isset($_POST["upload"])) {
	$target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["user-avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["user-avatar"]["tmp_name"]);
        if($check !== false) {

            $uploadOk = 1;
        } else {
            $message_failure =  "File is not an image.";
            $uploadOk = 0;
        }// Check if file already exists
    if (file_exists($target_file)) {
        $message_failure = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["user-avatar"]["size"] > 500000) {
        $message_failure =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $message_failure = "Sorry, only JPG, JPEG and PNG files are allowed.";
        $uploadOk = 0;
    } else {
        if (move_uploaded_file($_FILES["user-avatar"]["tmp_name"], $target_file)) {

            $query90 = "UPDATE registration SET profile_picture = '{$target_file}' WHERE email = '{$email}'";
            $run_query90 = mysqli_query($connection, $query90);

            $success =  "<div class='alert alert-success'><b>Profile picture uploaded successfully</b>";
        } else {
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message_failure = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    }
            $message_failure = "Sorry, there was an error uploading your file.";
        }
    }
    }

?>
<?php
	if(isset($_POST['update'])){

		 $password = md5(sha1($_POST['password']));
		 $queryh = "SELECT * FROM registration WHERE username = '{$username}' AND password = '{$password}'";
		 $run_queryh = mysqli_query($connection, $queryh);

		 if(mysqli_num_rows($run_queryh)==1){

		$btcaccount = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['btcaccount'])));
		$email2 = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['email'])));

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $message_failure = "<div class='alert fade-in alert-danger container'>
			  <strong>Email!</strong> not well formed.
			  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times; &nbsp;</a>
			</div>";
        }else if(empty($btcaccount)){
            $message_failure = "<div class='alert fade-in alert-danger container'>
			  <strong>Note: Withdrawals cannot be made with wallet address empty!</strong>
			  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times; &nbsp;</a>
			</div>";
        }else{
                $query2 = "UPDATE registration SET  email = '{$email2}', btcaccount = '{$btcaccount}' WHERE username = '{$username}'";
            $run_query2 = mysqli_query($connection, $query2);


            if($run_query2 == true){
                $message = "<div class='alert fade-in alert-success container'>
                  <strong>Success!</strong> Profile Updated.
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times; &nbsp;</a>
                </div>";
            }else{
                $message_failure = "<div class='alert fade-in alert-success container'>
                  <strong>Error!</strong> Profile Update failed.
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times; &nbsp;</a>
                </div>";
            }
        }
	}else{
	$message_failure = "<div class='alert fade-in alert-danger container'>
                  <strong>Password invalid</strong>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times; &nbsp;</a>
                </div>";
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
        <title>Dashboard | Profile</title>
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
						<li class=""><a href="deposit.php">
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
						<li class="active"><a href="settings.php">
						   <i class="fas  "></i>
							Profile
						</a></li>
						<li class=" "><a href="personal_support.php">
						   <i class="fas  "></i>
							Support
						</a></li><li class=" "><a href="logout.php">
						   <i class="fas  "></i>
							Logout
						</a></li></ul>
                    </div>

                </div>
                <div class="col-12 col-md-8 col-lg-9 col-xl-10  pl-2 wow fadeInDown" data-wow-delay="0.4s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">

                    <div class="row">
    <div class="col-12 col-lg-6 p-2">
<?php
	if(isset($message)){
		echo "<p class='text-center' style='color:green;font-weight:bold;text-align:center;'>{$message}</p>";
	}
	if(isset($message_failure)){
		echo "<p class='text-center' style='color:red;font-weight:bold;text-align:center;'>{$message_failure}</p>";
    }
    if(isset($success)){
        echo "<p class='text-center' style='color:green;font-weight:bold;text-align:center;'>{$success}</p>";
    }
?>
        <div class="personal-form page-set">

            <p class="h5">Update profile</p>
            <form id="newPassword" action="" method="POST">

							<div class="form-group fields-box field-newpassword-prevpassword required">
				<label class="control-label" for="newpassword-prevpassword"><i class="fas  - "></i> Email</label>
				<input type="text" id="newpassword-prevpassword" class="form-control " name="email" value="<?php echo $email;?>" required aria-required="true">

				<div class="help-block"></div>
				</div>            <div class="form-group fields-box field-newpassword-newpassword required">
				<label class="control-label" for="newpassword-newpassword"><i class="fas  "></i> Wallet Address</label>
				<input type="text" id="newpassword-confirmpassword" class="form-control  " name="btcaccount" value="<?php echo $btcaccount;?>"   aria-required="true">

				<div class="help-block"></div>
				</div>            <div class="form-group fields-box field-newpassword-confirmpassword required">
				<label class="control-label" for="newpassword-confirmpassword">
<i class="fas  "></i> Password</label>
				<input type="password" id="newpassword-newpassword" class="form-control  " name="password"  aria-required="true">
				<div class="help-block"></div>
</div>

            <div class="form-group">
                <button type="submit" name="update" class="btn btn-primary" style="width:100%;">Update</button>        </div>

            </form>

        </div>

    </div>
	<!--
    <div class="col-12 col-lg-6 p-2">

        <div class="personal-form page-set">
            <p class="h5">Two factor authentification</p>
                            <div class="fields-box" style="text-align: center;">
                    <select id="type_two_fa" class="form-control select2-hidden-accessible" name="type_two_fa" data-s2-options="s2options_e9bc2761" data-krajee-select2="select2_438b80e1" style="display:none" tabindex="-1" aria-hidden="true">
<option value="">Select a state ...</option>
<option value="0" selected="">Telegram</option>
</select><span class="select2 select2-container select2-container--krajee-bs4" dir="ltr" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-type_two_container"><span class="select2-selection__rendered" id="select2-type_two_container" title="Telegram">Telegram</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>                </div>

                <button type="submit" class="actionBtn actionBtn__w100p" onclick="showTwoFaModal()">Enable</button>
        </div>
            </div>
</div>-->
<div class="row">
    <div class="col-12 col-lg-6 p-2 wow fadeInDown" data-wow-delay="0.7s" data-wow-offset="0" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInDown;">

        <div class="personal-form page-set">

            <p class="h5">User settings</p>
            <form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_csrf-frontend" value="Op4nXSECYWI5mxNsDifaznmWUiXeCX9aiuytr6789oMLEr5SllFXdoa0xx4da-BIPcDHahiTjS7iw==">
					<div class="row align-items-center">
						<div class="col">
							<div class="form-group ">
								<label class="control-label" for="usersettings-avatarfile"><i class="fas  "></i> <?php echo $username;?></label>

								<div class="custom-file">

                                    <input type="file" id="usersettings-avatarfile" class="js-avatar" name="user-avatar" style="display:none;">
									<label class="upload-avatar actionBtn actionBtn__outline text-center" for="usersettings-avatarfile">
										<i class="fas download"></i>
										Upload Profile picture (max 2Mb)
									</label>
								</div>
								<div class="help-block"><div></div></div>
							</div>
						</div>

						<div class="col-auto">
							<?php if($pics == NULL){ echo "<div class='settings-avatar js-avatar-preview' style='background-image: url(&#39;/images/defavatar.jpg&#39;);'>
							</div>" ;}else{
								echo "<div class='settings-avatar js-avatar-preview' style='background-image: url(&#39;$pics&#39;);'>
							</div>" ;
							}
							?>
						</div>
					</div>

					<div class="form-group fields-box field-usersettings-username">
						<label class="control-label" for="usersettings-username"><i class="fas  "></i> Username</label>
						<input type="text" id="usersettings-username" disabled  class="form-control  " name="UserSettings[username]" value="<?php echo $username;?>">

						<div class="help-block"></div>
					</div>


					<div class="form-group btn-group" align="center">
						<button type="submit" name="upload" class="btn btn-primary" style="width:100%;">Edit profile picture</button>  &nbsp;
						<a href="update-password.php"><button type="button" name="" class="btn btn-danger" style="width:100%;">Update password</button></a>                </div>

            </form>

        </div>

    </div>
    <div class="col-12 col-lg-6 p-2">

        &nbsp;

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
<div class="modal-body">
    <div class="container-fluid">

        <div class="col-12 text-center pop-up-iconbox">
            <i class="fab telegram-plane"></i>
        </div>
        <div class="col-12 text-center">
            <p class="h4">
                Send to bot code - <span class="js-code" style="color: #fff;"></span> .<br>
            </p>
                        <a href="https://t.me/crypto_two_factor_bot" target="_blank">http://t.me/crypto_two_factor_bot</a>
        </div>

    </div>


</div>
<div class="modal-footer">

</div>
</div>
</div>
</div>
<div id="telegram_disable_modal" class="fade modal" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="telegram_disable_modal-label">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div id="modalHeader" class="modal-header">
<h5 id="telegram_disable_modal-label" class="modal-title">Disable Telegram 2fa</h5>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <div class="modal-alert">Enter the code that was sent to your Telegram.<br>
        <form id="disable_telegram">
            <div class="form-group field-newpassword-prevpassword required has-error">
                <input type="text" class="form-control" name="code" required="" style=" margin-top: 10px;">
            </div>
            <button type="button" class="btn btn-danger" style="width:100%;margin-top:10px;" onclick="confirmTelegramCode(this)">Disable</button>        </form>
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
<script>/*jQuery(function ($) {
jQuery('#newPassword').yiiActiveForm([{"id":"newpassword-prevpassword","name":"prevpassword","container":".field-newpassword-prevpassword","input":"#newpassword-prevpassword","enableAjaxValidation":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Previous password cannot be blank."});}},{"id":"newpassword-newpassword","name":"newpassword","container":".field-newpassword-newpassword","input":"#newpassword-newpassword","enableAjaxValidation":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"New password cannot be blank."});yii.validation.string(value, messages, {"message":"New password must be a string.","min":6,"tooShort":"New password should contain at least 6 characters.","skipOnEmpty":1});}},{"id":"newpassword-confirmpassword","name":"confirmpassword","container":".field-newpassword-confirmpassword","input":"#newpassword-confirmpassword","enableAjaxValidation":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Confirm password cannot be blank."});yii.validation.compare(value, messages, {"operator":"==","type":"string","compareAttribute":"newpassword-newpassword","compareAttributeName":"NewPassword[newpassword]","skipOnEmpty":1,"message":"Confirm password must be equal to \"New password\"."}, $form);}}], []);

jQuery&&jQuery.pjax&&(jQuery.pjax.defaults.maxCacheLength=0);
if (jQuery('#type_two_fa').data('select2')) { jQuery('#type_two_fa').select2('destroy'); }
jQuery.when(jQuery('#type_two_fa').select2(select2_438b80e1)).done(initS2Loading('type_two_fa','s2options_e9bc2761'));

jQuery('#userSettings').yiiActiveForm([{"id":"usersettings-username","name":"username","container":".field-usersettings-username","input":"#usersettings-username","enableAjaxValidation":true}], []);
jQuery('#telegram_two_fa_modal').modal({"show":false});
jQuery('#telegram_disable_modal').modal({"show":false});
jQuery('#modal_socket').modal({"show":false});
});</script>

    <script type="text/javascript">>new WOW().init();
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

        });*/
    </script>

    </body></html>
