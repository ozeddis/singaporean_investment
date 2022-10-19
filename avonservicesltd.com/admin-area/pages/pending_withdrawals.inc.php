<?php
	$date78 = Date("Y");
	$query = " SELECT * FROM admin WHERE id = '{$_SESSION['manager_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
			$password = $result['password'];
		}
	}
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Pending Withdrawals</h1>
  </div>
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="admin_dashboard.php">Dashboard</a></li>
	</ul>
  </div>
</div>
	<div class="row">
	  <div class="col-md-12">
		<div class="card">
		  <div class="card-body table-responsive">
			<table class="table table-hover table-bordered" id="sampleTable">
			  <thead>
				 <tr>
					 <th class='text-center'>S/N</th>
					<th class='text-center'>USER</th>
					<th class='text-center'>TRANSACTION ID</th>
					<th class='text-center'>AMOUNT</th>
					<th class='text-center'>CURRENCY</th>
					<th class='text-center'>RECEIVING ADDRESS</th>
					<th class='text-center'>BATCH</th>

					<th class='text-center'>DATE</th>
					<th class='text-center'>TIME</th>
					<th class='text-center'>Action</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
						$pending = "pending";
						$query22 = " SELECT * FROM withdraw_from_wallet WHERE status = '{$pending}'";
						$run_query22 = mysqli_query($connection, $query22);
						if(mysqli_num_rows($run_query22) > 0){
							while($result = mysqli_fetch_assoc($run_query22)){
								$id = $result['id'];
								$wallet_address = $result['wallet_address'];
								$owner = $result['username'];
								$transaction_id = $result['transaction_id'];
								$date = $result['date'];
								$time = $result['time'];
								$amount = $result['amount'];
								$currency = $result['crypto'];


								echo "
										<tr>
										<td class='text-center'>$id</td>
											<td class='text-center'>$owner</td>
											<td class='text-center'>$transaction_id</td>
											<td class='text-center'>$ $amount</td>
											<td class='text-center'>$currency</td>
											<td class='text-center'>$wallet_address</td>
											<form action='' method='POST'>
											<td><input type='text'class='form-control' placeholder='transaction batch' name='trans_id'></td>

											<td>$date</td>
											<td class='text-center'>$time</td>
											<td>
											<input type='submit' name='pay_btn' value='Pay' class='btn btn-info'>
											<input type='submit' name='reject_btn' value='Reject' class='btn btn-danger'>

											<input type='hidden' name='hidden_id' value='{$id}'>
											</form></td>
										</tr>
									";
							}
						}else{
							echo "You have no pending withdrawals ";
						}
					?>
			  </tbody>
			  <?php
					if(isset($_POST['reject_btn'])){
						$hidden_id = $_POST['hidden_id'];
						$date78 = date("Y");
						$query22 = " SELECT * FROM withdraw_from_wallet WHERE id = '{$hidden_id}'";
						$run_query22 = mysqli_query($connection, $query22);

						while($result = mysqli_fetch_assoc($run_query22)){
							$id = $result['id'];
							$mb_wallet = $result['mb_wallet'];

							$qu = " DELETE FROM withdraw_from_wallet WHERE id = '{$id}'";
							$run_qu = mysqli_query($connection, $qu);

							if($run_qu == true){
								$query22 = " SELECT * FROM registration WHERE wallet = '{$mb_wallet}'";
								$run_query22 = mysqli_query($connection, $query22);

								if(mysqli_num_rows($run_query22) > 0){
									while($result = mysqli_fetch_assoc($run_query22)){
										$email_2 = $result['email'];
										$user = $result['username'];
									}

									$subject = "Rejection";
									require'../phpmailer/PHPMailerAutoload.php';
									$mail = new PHPMailer;

									$mail->Host='smtp.namecheap.com';
									$mail->Port=587;
									$mail->SMTPAuth=true;
									$mail->SMTPSecure='tls';
									$mail->Username='support@agrocapital-management.com';
									$mail->Password='[1FQxk~H8^Kw]';

									$mail->setFrom('support@agrocapital-management.com', 'Agro Capital Management');
									$mail->addAddress($email_2);
									$mail->addReplyTo('support@agrocapital-management.com', 'Agro Capital Management');

									$mail->isHTML(true);
									$mail->Subject='Withdrawal:'.$subject;
									$mail->Body='
									<tr>
									<img src="https://agrocapital-management.com/img/logo.png" width="130px" height="90px">
									<td class="em_h20" style="font-size:0px; line-height:0px; height:25px;" height="25">&nbsp;</td>
									<!——this is space of 25px to separate two paragraphs ——>
									</tr>
							<tr>
							<td style="font-family:’Open Sans’, Arial, sans-serif; font-size:18px; line-height:22px; color:white; text-transform:; letter-spacing:2px; padding-bottom:12px;" valign="top" align="left">
							<h4> Hello '.$user_with.',</h4>
							<p>Agro Capital Management Rejected your withdrawal, Kindly contact support through support@agrocapital-management.com</p>
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
									alert(\"Rejected withdrawal successfully\");
									window.location = \"admin_dashboard.php?p=pending_withdrawals\"
									</script>";
							}else{
								echo "<script type=\"text/javascript\">
								alert(\"Could not reject withdrawal\");
								window.location = \"admin_dashboard.php?p=pending_withdrawals\"
								</script>";
							}
						}

						$query22 = " DELETE FROM withdraw_from_wallet WHERE id = '{$hidden_id}'";
						$run_query22 = mysqli_query($connection, $query22);

						if($run_query22 == true){
							echo "<script type=\"text/javascript\">
								alert(\"Rejected withdrawal successfully\");
								window.location = \"admin_dashboard.php?p=pending_withdrawals\"
								</script>";
						}else{
							echo "<script type=\"text/javascript\">
								alert(\"could not reject withdrawal\");
								window.location = \"admin_dashboard.php?p=pending_withdrawals\"
								</script>";
						}
					}
				}
			}

				?>


			  <?php
					if(isset($_POST['pay_btn'])){
						$hidden_id = $_POST['hidden_id'];
						$transaction_ID = $_POST['trans_id'];
						$status = "active";
						$credit = "debit";
						$date44 = Date("Y-m-d");
						$time32 = time();
						$time44 = Date("H:i:s", $time32);
						$description = "Withdrawal";
						$date78 = date('Y');

						$query22 = " SELECT * FROM withdraw_from_wallet WHERE id = '{$hidden_id}'";
						$run_query22 = mysqli_query($connection, $query22);

						while($result = mysqli_fetch_assoc($run_query22)){
							$id = $result['id'];
							$wallet_address = $result['wallet_address'];
							$mb_wallet = $result['mb_wallet'];
							$transaction_id = $result['transaction_id'];
							$date = $result['date'];
							$time = $result['time'];
							$amount34 = $result['amount'];
							$amount25 = $amount34;

							$query333 = "UPDATE `withdraw_from_wallet` SET status = '{$status}' WHERE `id` =  '{$id}'";
							$run_query333 = mysqli_query($connection, $query333);

							$query = "INSERT INTO wallet (wallet_address,amount,status,transaction_id,date,time) VALUES ('{$mb_wallet}','{$amount25}','{$credit}','{$transaction_id}','{$date44}','{$time44}')";
							$run_query = mysqli_query($connection, $query);

							if($run_query == true){
								$query22 = " SELECT * FROM registration WHERE wallet = '{$mb_wallet}'";
								$run_query22 = mysqli_query($connection, $query22);

								if(mysqli_num_rows($run_query22) > 0){
									while($result = mysqli_fetch_assoc($run_query22)){
										$email_2 = $result['email'];
										$user = $result['username'];
									}

									$subject = "Approval";
									require'../phpmailer/PHPMailerAutoload.php';
									$mail = new PHPMailer;

									$mail->Host='smtp.namecheap.com';
									$mail->Port=587;
									$mail->SMTPAuth=true;
									$mail->SMTPSecure='tls';
									$mail->Username='support@agrocapital-management.com';
									$mail->Password='[1FQxk~H8^Kw]';

									$mail->setFrom('support@agrocapital-management.com', 'Agro Capital Management');
									$mail->addAddress($email_2);
									$mail->addReplyTo('support@agrocapital-management.com', 'Agro Capital Management');

									$mail->isHTML(true);
									$mail->Subject='Withdrawal:'.$subject;
									$mail->Body='

									<table>
									<tbody>
									<tr>
									<img src="https://agrocapital-management.com/img/logo.png" width="130px" height="90px">
									<td class="em_h20" style="font-size:0px; line-height:0px; height:25px;" height="25">&nbsp;</td>
									<!——this is space of 25px to separate two paragraphs ——>
									</tr>
									<tr>
									<td style="font-family:’Open Sans’, Arial, sans-serif; font-size:18px; line-height:22px; color:white; text-transform:; letter-spacing:2px; padding-bottom:12px;" valign="top" align="left">
										<h4> Hello '.$user.',</h4>
										<h4>Withdrawal has been made successfully.</h4>
										<p>Wallet Address</p>
										<p>'.$wallet_address.'</p>
										<p>Transaction batch is: '.$transaction_ID.' </p>
										<p>Amount: $'.$amount.'</p>&nbsp;
										<a href="https://agrocapital-management.com">www.agrocapital-management.com</a>
										<p>Login into your account to view your investment log.</p>
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
											alert(\"Paid Member Withdrawal successfully\");
											window.location = \"admin_dashboard.php?p=pending_withdrawals\"
											</script>";
									}else{
										echo "<script type=\"text/javascript\">
										alert(\"Could not pay user\");
										window.location = \"admin_dashboard.php?p=pending_withdrawals\"
										</script>";
									}
								}
							}else{
								echo "<script type=\"text/javascript\">
									alert(\"could not pay user\");
									window.location = \"admin_dashboard.php?p=pending_withdrawals\"
									</script>";
							}
						}
					}
				?>
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>
