<?php
	require"../include/server.inc.php";
?>

<?php
	$query = " SELECT * FROM registration WHERE id = '{$_SESSION['manager_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$manager_id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
			
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
            $message_failure =  "File is not an Video.";
            $uploadOk = 0;
        }// Check if file already exists
    if (file_exists($target_file)) {
        $message_failure = "Sorry, file already exists.";
        $uploadOk = 0;
    }else if ($_FILES["user-avatar"]["size"] > 50000000) {
        $message_failure =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }else if($imageFileType != "gif" && $imageFileType != "avi" && $imageFileType != "mkv" && $imageFileType != "mp4") {
        $message_failure = "Sorry, only MP4 and GIF files are allowed.";
        $uploadOk = 0;
    }else{
        if (move_uploaded_file($_FILES["user-avatar"]["tmp_name"], $target_file)) {

            $query90 = "UPDATE files SET video = '{$target_file}' WHERE id = 1";
            $run_query90 = mysqli_query($connection, $query90); 
			if($run_query90 == TRUE){
				$message_failure = "<script type=\"text/javascript\">
								alert(\"Testimonal video uploaded\");
								window.location = \"admin_dashboard.php?p=up-test\"
								</script>";
			}else{
				$message_failure = "Sorry, there was an error uploading your file.";
			}
        }else{
    // Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					$message_failure = "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				}
			}
		}
    }
    
?>
<?php
   
    // Check if image file is a actual image or fake image
    if(isset($_POST["upload2"])) { 
	$target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["user-avatar2"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["user-avatar2"]["tmp_name"]);
        if($check !== false) {
        
            $uploadOk = 1;
        } else {
            $message_failure =  "File is not an Video.";
            $uploadOk = 0;
        }// Check if file already exists
    if (file_exists($target_file)) {
        $message_failure = "Sorry, file already exists.";
        $uploadOk = 0;
    }else if ($_FILES["user-avatar2"]["size"] > 5000000) {
        $message_failure =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }else if($imageFileType != "gif" && $imageFileType != "avi" && $imageFileType != "mkv" && $imageFileType != "mp4") {
        $message_failure = "Sorry, only MP4 and GIF files are allowed.";
        $uploadOk = 0;
    }else{
        if (move_uploaded_file($_FILES["user-avatar2"]["tmp_name"], $target_file)) {

            $query90 = "UPDATE files SET video = '{$target_file}' WHERE id = 2";
            $run_query90 = mysqli_query($connection, $query90); 
			if($run_query90 == TRUE){
				$message_failure = "<script type=\"text/javascript\">
								alert(\"Testimonal video uploaded\");
								window.location = \"admin_dashboard.php?p=up-test\"
								</script>";
			}else{
				$message_failure = "Sorry, there was an error uploading your file.";
			}
        }else{
    // Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					$message_failure = "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				}
			}
		}
    }
    
?> 
<?php
   
    // Check if image file is a actual image or fake image
    if(isset($_POST["upload3"])) { 
	$target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["user-avatar3"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["user-avatar3"]["tmp_name"]);
        if($check !== false) {
        
            $uploadOk = 1;
        } else {
            $message_failure =  "File is not an Video.";
            $uploadOk = 0;
        }// Check if file already exists
    if (file_exists($target_file)) {
        $message_failure = "Sorry, file already exists.";
        $uploadOk = 0;
    }else if ($_FILES["user-avatar3"]["size"] > 5000000) {
        $message_failure =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }else if($imageFileType != "gif" && $imageFileType != "avi" && $imageFileType != "mkv" && $imageFileType != "mp4") {
        $message_failure = "Sorry, only MP4 and GIF files are allowed.";
        $uploadOk = 0;
    }else{
        if (move_uploaded_file($_FILES["user-avatar3"]["tmp_name"], $target_file)) {

            $query90 = "UPDATE files SET video = '{$target_file}' WHERE id = 3";
            $run_query90 = mysqli_query($connection, $query90); 
			if($run_query90 == TRUE){
				$message_failure = "<script type=\"text/javascript\">
								alert(\"Testimonal video uploaded\");
								window.location = \"admin_dashboard.php?p=up-test\"
								</script>";
			}else{
				$message_failure = "Sorry, there was an error uploading your file.";
			}
        }else{
    // Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					$message_failure = "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				}
			}
		}
    }
    
?> 

<?php
	if(!$_SESSION['manager_id']){
		header("location: ../login.php");
	}
?>


<!DOCTYPE html>
<html lang="en"><head><!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/616dac9df7c0440a591ed3ae/1fia6kifb';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script--><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        

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

            <p class="h5">Testimonial Videos</p>
            <form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_csrf-frontend" value="Op4nXSECYWI5mxNsDifaznmWUiXeCX9aiuytr6789oMLEr5SllFXdoa0xx4da-BIPcDHahiTjS7iw==">
					<div class="row">
						<div class="col-md-12">
							<div class="card ">
								 

								<div class="card-body table-responsive">
									<table class="table table-hover table-bordered">
									<thead> 
										<tr>
											<th class='text-center'>Id</th>
											<th class='text-center'>Video</th>
											<th class=''>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class='text-center'> <p>1</p></td>
											<td class='text-center'> <input type="file" class="btn btn-danger"  name="user-avatar"/></td>
											<td class='text-center'> <button type="submit" name="upload" class="btn btn-primary" style="width:100%;">Upload</button>  &nbsp;</td>
										</tr>
										<tr>
											<td class='text-center'> <p>2</p></td>
											<td class='text-center'> <input type="file" class="btn btn-danger"  name="user-avatar2"/></td>
											<td class='text-center'> <button type="submit" name="upload2" class="btn btn-primary" style="width:100%;">Upload</button>  &nbsp;</td>
										</tr>
										<tr>
											<td class='text-center'> <p>3</p></td>
											<td class='text-center'> <input type="file" class="btn btn-danger"  name="user-avatar3"/></td>
											<td class='text-center'> <button type="submit" name="upload3" class="btn btn-primary" style="width:100%;">Upload</button>  &nbsp;</td>
										</tr>
									</tbody>
									</table>
								</div>
								<div class="help-block"><div></div></div>
							</div>
						</div>

						
					</div>

					<div class="form-group fields-box field-usersettings-username">
						<label class="control-label" for="usersettings-username"><i class="fas  "></i> Username</label>
						<input type="text" id="usersettings-username" disabled  class="form-control  " name="UserSettings[username]" value="<?php echo $username;?>">

						<div class="help-block"></div>
					</div>


					<div class="form-group btn-group" align="center">
						<button type="submit" name="upload" class="btn btn-primary" style="width:100%;">Upload</button>  &nbsp;
						     </div>

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
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">�</span></button>
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
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">�</span></button>
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
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">�</span></button>
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