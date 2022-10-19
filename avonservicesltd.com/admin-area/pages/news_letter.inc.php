
<?php
	if( isset($_POST["submit_now"])){
		require'phpmailer/PHPMailerAutoload.php';
		$subject2 = strtoupper(htmlentities(trim(mysqli_real_escape_string($connection, $_POST["subject"]))));
		$message24 = htmlentities(trim(mysqli_real_escape_string($connection, $_POST["message22"])));
		$date78 = date("Y");

		function send($email, $username){
			global $subject2;
			global $message24;
			global $date78;


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
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject2;
			$mail->Body='

			<tr>
			<img src="https://agrocapital-management.com/img/logo.png" width="130px" height="90px">
			<td class="em_h20" style="font-size:0px; line-height:0px; height:25px;" height="25">&nbsp;</td>
			<!——this is space of 25px to separate two paragraphs ——>
			</tr>
			<tr>
			<td style="font-family:’Open Sans’, Arial, sans-serif; font-size:18px; line-height:22px; color:white; text-transform:; letter-spacing:2px; padding-bottom:12px;" valign="top" align="left">
				<h3> Dear Investors,</h3>
					<p>'.$message24.'</p>
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
				alert(\"Bulk Email has been sent to all clients.\");
				window.location = \"admin_dashboard.php?p=news_letter\"
				</script>";
			}else{
				echo "<script type=\"text/javascript\">
				alert(\"Your message was not sent, try again later\");
				window.location = \"admin_dashboard.php?p=news_letter\"
				</script>";
			}
		}

		$query = "SELECT * FROM registration";
		$run_query = mysqli_query($connection, $query);

		while($result = mysqli_fetch_assoc($run_query)){
			$email = $result['email'];
			$username = $result['username'];

			send($email, $username);
		}
		$query = "SELECT * FROM new_letter_subscription";
		$run_query = mysqli_query($connection, $query);

		while($result = mysqli_fetch_assoc($run_query)){
			$email = $result['email'];


			send($email);
		}
	}
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Send News Letter to Investors</h1>
	<?php
		if(isset($message)){
			echo "<div class='alert alert-info'<p class='text-center' style='font-weight:bold;color:green;'>{$message}</p></div>";
		}
		if(isset($message_failure)){
			echo "<div Class='alert alert-danger'><p class='text-danger text-center' style='font-weight:bold;'>{$message_failure}</p></div>";
		}
	?>
  </div>
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="admin_dashboard.php">Dashboard</a></li>
	</ul>
  </div>
</div>
<div class="card">
			<div id='live_data'></div>
			<form action='' method='POST'>
				<div class='row'>
					<div class='col-xs-12 col-sm-12 col-md-4'>
						<div class='input-group'>
							<span class="input-group-addon" id='basic-addon2'>SUBJECT</span>
							<input type="text" name="subject" class="form-control" placeholder="Enter Messge Subject" required>

						</div>
					</div>
					<div class='col-xs-12 col-sm-12 col-md-8'>
						<div class='input-group'>
							<span class="input-group-addon" id='basic-addon2'>COMPOSE MESSAGE</span>
							<input class="form-control" name="message22" required></textarea>
						</div>

					</div><br><br><br>
				</div>
				<div class="row">
				  <div class="col-xs-12 table-responsive">
					<table class="table table-striped table-bordered">
					  <thead>
						<tr>
							<th>USERNAME</th>
							<th>EMAIL</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
							$query = "SELECT * FROM registration";
							$run_query = mysqli_query($connection, $query);

							if(mysqli_num_rows($run_query) > 0){
								$x = 0;
								while($row = mysqli_fetch_assoc($run_query)){
									$username = $row['username'];
									$email = $row['email'];


									echo"
										<tbody>
											<tr>
												<td>
													<div class = 'input-group'>
														<input type='text' disabled name='username[]' value = '{$username}' class='form-control'>
													</div>
												</td>
												<td>
													<div class = 'input-group'>
														<input type='text' disabled name='email' value = '{$email}' class='form-control'>
													</div>
												</td>

											</tr>
										</tbody>
									";

								}
							}else{
								$message_failure = "There are no registered members";
							}
						?>
					  </tbody>
					</table><hr>

				  </div>
				</div>
				<div class='row'>
					<div class='col-xs-12 col-sm-12 col-md-12'>

					</div>
				</div>
				<div class='row'>
					<div class='col-xs-12 col-sm-12 col-md-4'>
					</div>
					<div class='col-xs-12 col-sm-12 col-md-4'>
						<input type="submit" style='margin-left:10px;' name="submit_now" value="SEND" class="btn btn-lg btn-info" />
					</div>
					<div class='col-xs-12 col-sm-12 col-md-4'>

					</div>
				</div>
			</form>
		</div>
