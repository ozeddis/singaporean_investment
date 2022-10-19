<?php
    $query = "SELECT * FROM registration ORDER BY id ASC";
    $run_query = mysqli_query($connection, $query);
    if(mysqli_num_rows($run_query)>0){
        while($result = mysqli_fetch_assoc($run_query)){
            $us = $result['username'];
        }
    }else{
        $us = "No registered members";
    }
?>

<?php
    if(isset($_POST['save'])){
        $body = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['message']))));
        $user = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['username'])));
        $subject2 = $_POST['subject'];

        $query = "SELECT * FROM registration WHERE username = '{$user}'";
        $run_query = mysqli_query($connection, $query);
        if(mysqli_num_rows($run_query)>0){
            while($result = mysqli_fetch_assoc($run_query)){
                $email = $result['email'];
            }
           $date78 = DATE("Y");
            require '../phpmailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
			$mail->Host='smtp.namecheap.com';
			$mail->Port=587;
			$mail->SMTPAuth=true;
			$mail->SMTPSecure='tls';
			$mail->Username='support@agrocapital-management.com';
			$mail->Password='[1FQxk~H8^Kw]';                                // TCP port to connect to

			$mail->setFrom('support@agrocapital-management.com', 'Agro Capital Management');
			$mail->addAddress($email);
			$mail->addReplyTo('support@agrocapital-management.com', 'Agro Capital Management');

			// Content
            $mail->Subject=$subject2;
			$mail->isHTML(true);                                  // Set email format to HTML
 			$mail->Body='
      <tr>
      <img src="https://agrocapital-management.com/img/logo.png" width="130px" height="90px">
      <td class="em_h20" style="font-size:0px; line-height:0px; height:25px;" height="25">&nbsp;</td>
      <!——this is space of 25px to separate two paragraphs ——>
      </tr>
      <tr>
      <td style="font-family:’Open Sans’, Arial, sans-serif; font-size:18px; line-height:22px; color:white; text-transform:; letter-spacing:2px; padding-bottom:12px;" valign="top" align="left">
        <h3> Dear Investor '.$user.',</h3>
          <p>'.$body.'</p>
          <br>
          <h4>Kind Regards,</h4>
          <p>Agro Capital Management</p>
          <br><br>
          <a href="https://agrocapital-management.com">https://agrocapital-management.com</a>
      </td>
      </tr>
      </tbody></table></td>
      </tr>

      <!—//Content Text Section–>
      <!—Footer Section—>
      <tr>
      <td style="padding:38px 30px;" class="em_padd" valign="top" bgcolor="#f6f7f8" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
      <tbody><tr>
      <td style="padding-bottom:16px;" valign="top" align="center"><table cellspacing="0" cellpadding="0" border="0" align="center">
      <tbody><tr>
      <td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://capstone-finance.com/assets/images/facebook.png" alt="fb" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:26px;" width="26" border="0" height="26"></a></td>
      <td style="width:6px;" width="6">&nbsp;</td>
      <td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://capstone-finance.com/assets/images/insta.png" alt="ig" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:27px;" width="27" border="0" height="26"></a></td>
      <td style="width:6px;" width="6">&nbsp;</td>
      <td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://capstone-finance.com/assets/images/tweet.png" alt="yt" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:26px;" width="26" border="0" height="26"></a></td>
      </tr>
      </tbody></table></td>
      </tr>
      <tr>
      <td style="font-family:’Open Sans’, Arial, sans-serif; font-size:11px; line-height:18px; color:#999999;" valign="top" align="center"><a href="https://agrocapital-management.com/" target="_blank" style="color:#999999; text-decoration:underline;">HOME</a> | <a href="https://agrocapital-management.com/aml-policy.php" target="_blank" style="color:#999999; text-decoration:underline;">TERMS OF SERVICE</a> | <a href="https://agrocapital-management.com/help-and-support.php" target="_blank" style="color:#999999; text-decoration:underline;">FAQS</a><br>
      © 2022 Agro Capital Management. All Rights Reserved.<br>
      If you do not wish to receive any further emails from us, please <a href="#" target="_blank" style="text-decoration:; color:#999999;">unsubscribe</a></td>
      </tr>
      </tbody></table></td>
      </tr>
      <tr>
      <td class="em_hide" style="line-height:1px;min-width:700px;background-color:#ffffff;"><img alt="" src="https://agrocapital-management.com/img/logo.png" style="max-height:1px; min-height:1px; display:block; width:700px; min-width:700px;" width="700" border="0" height="1"></td>
      </tr>
      </tbody></table></td>
      </tr>
      </tbody></table>
      <div class="em_hide" style="white-space: nowrap; display: none; font-size:0px; line-height:0px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      </body></html>
';
			if($mail->send()){
				echo "<script type=\"text/javascript\">
				alert(\"Email has been sent to $user\");
				</script>";
			}else{
				echo "<script type=\"text/javascript\">
				alert(\"Your message was not sent, try again later\");
				</script>";
			}
        }else{
            echo "<script type=\"text/javascript\">
            alert(\"Invalid user\");
            </script>";
        }
    }
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Send mail to Investors</h1>
  </div>
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="admin_dashboard.php">Dashboard</a></li>
	</ul>
  </div>
</div>
<div class="container card">
	<div class="row">
		<?php
			if(isset($message)){
				echo "<p class='text-center' style='color:green;font-weight:bold;'>{$message}</p>";
			}
			if(isset($message_failure)){
				echo "<p class='text-center' style='color:#e60000;font-weight:bold;'>{$message_failure}</p>";
			}
		?>
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="card">
			  <div class="card-body">
				<form action="" method="POST">

				<div class="form-group">
					<label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Investors Username">
				</div>
                <div class="form-group">
					<label class="form-label">Subject</label>
					<input type="text" class="form-control" name="subject" placeholder="Enter mail subject" required>
				</div>
				<div class="form-group">
					<label class="form-label">Message body</label>
					<input type="text" class="form-control" placeholder="Enter your message here..." name="message" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary" name="save">SEND MAIL</button>
				</form>
			  </div>
			</div>
		  </div>
		<div class="col-md-2">
		</div>
	</div>
</div>
