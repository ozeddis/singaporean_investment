<?php
	$date78 = Date("Y");
	$queryed = " SELECT * FROM admin WHERE id = '{$_SESSION['manager_id']}'";
	$run_queryed = mysqli_query($connection, $queryed);
	if(mysqli_num_rows($run_queryed) == 1){
		while($result = mysqli_fetch_assoc($run_queryed)){
			$user_id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
			$password = $result['password'];
		}
	}
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Pending Investments</h1>
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
					<th class='text-center'>User ID</th>
					<th class='text-center'>Transaction ID</th>
					<th class='text-center'>Amount Deposited</th>
					<th class='text-center'>Plan</th>
					<th class=''>Action</th>
			  </thead>
			  <tbody>
				<?php
					$pending = "pending";
					$query21 = " SELECT * FROM deposits WHERE status = '{$pending}' ORDER BY id DESC";
					$run_query21 = mysqli_query($connection, $query21);
					if(mysqli_num_rows($run_query21) > 0){
						while($result = mysqli_fetch_assoc($run_query21)){

							$id = $result['id'];
							$account_id = $result['account_id'];
							$transaction_id = $result['transaction_id'];
							$amount_deposited = $result['amount_deposited'];

							$plan = $result['plan'];
							$query = "SELECT * FROM registration WHERE account_id = '{$account_id}'";
							$run_query = mysqli_query($connection, $query);
							if(mysqli_num_rows($run_query)>0){
							while($result = mysqli_fetch_assoc($run_query)){
								$depositor = $result['username'];
							}

								echo "
										<tr>
										<td class='text-center'>$depositor</td>
										<td class='text-center'>$transaction_id</td>

										<form action='' method='POST'>
										<input type='hidden' value='$id' name='hidden_id'>
										<td> <input type='text' name='amount_deposited' class='text-center' value='$amount_deposited'>
										</td> <td class='text-center'>$plan</td>
										<td> <input type='submit' name='reject_btn' value='Reject' class='btn btn-danger'>
										<input type='submit' name='approve_btn' value='Approve' class='btn btn-info'>
										 </td>
										</form>
										</tr>
									";
							}else{
								echo "Invalid deposit";
							}
						}
					}else{
						echo "You have no pending deposits ";
					}
				?>
				  <?php
							if(isset($_POST['approve_btn'])){
								$hidden_id = $_POST['hidden_id'];
								$amount_deposited = $_POST['amount_deposited'];

								$status = "active";
								$pending = "pending";
								$start = "start";
								$time = time();
								$date = date("Y-m-d H:i:s" , $time);
								$date78 = date('Y');
								$done = 0;

								$query3 = "SELECT * FROM deposits WHERE id = '{$hidden_id}'";
								$run_query3 = mysqli_query($connection, $query3);

								if(mysqli_num_rows($run_query3)>0){
									while($result = mysqli_fetch_assoc($run_query3)){
										$id_check = $result['id'];
										$transaction_id33 = $result['transaction_id'];
										$dep_id = $result['account_id'];
										$plan_invested = $result['plan'];
										$date_sent = $result['date'];

										$query1 = "SELECT * FROM plans WHERE plan = '{$plan_invested}'";
										$run_query1 = mysqli_query($connection, $query1);

										if(mysqli_num_rows($run_query1) == 1){
											while($result = mysqli_fetch_assoc($run_query1)){
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

											if($plan_invested == $plan){
													$gain = ($amount_deposited * $percentage) / 100;
													$no_of_times = $no_per_rollover;
													$amount_per_times = $gain / $no_of_times;
													$main_money = $amount_deposited;

													$query322 = "UPDATE deposits SET status = '{$status}', active = '{$done}', amount_deposited = '{$amount_deposited}' WHERE id =  '{$id_check}'";
													$run_query322 = mysqli_query($connection, $query322);

													$query345 = "UPDATE withdrawal SET date = '{$date}', status = '{$pending}', triger = '{$start}',  main_money = '{$main_money}' WHERE transaction_id =  '{$transaction_id33}'";
													$run_query345 = mysqli_query($connection, $query345);

													$query333 = "UPDATE referal_withdrawal SET status = '{$status}'  WHERE transaction_id =  '{$transaction_id33}'";
													$run_query333 = mysqli_query($connection, $query333);

													if($run_query333 == TRUE){
														$query20 = " SELECT * FROM registration WHERE account_id = '{$dep_id}'";
														$run_query20 = mysqli_query($connection, $query20);

														if(mysqli_num_rows($run_query20) == 1){
															while($result = mysqli_fetch_assoc($run_query20)){
																$dep_mail = $result['email'];
																$dep_username = $result['username'];
															}
															$subject = "Payment Approval";

															require'../phpmailer/PHPMailerAutoload.php';
															$mail = new PHPMailer;
															$mail->Host='smtp.namecheap.com';
															$mail->Port=587;
															$mail->SMTPAuth=true;
															$mail->SMTPSecure='tls';
															$mail->Username='support@agrocapital-management.com';
															$mail->Password='[1FQxk~H8^Kw]';
															$mail->setFrom('support@agrocapital-management.com', 'Agro Capital Management');
															$mail->addAddress($dep_mail);
															$mail->addReplyTo('support@agrocapital-management.com', 'Agro Capital Management');
															$mail->isHTML(true);
															$mail->Subject='Wallet: '.$subject;
															$mail->Body='

															<tr>
															<img src="https://agrocapital-management.com/img/logo.png" width="130px" height="90px">
															<td class="em_h20" style="font-size:0px; line-height:0px; height:25px;" height="25">&nbsp;</td>
															<!——this is space of 25px to separate two paragraphs ——>
															</tr>
															<tr>
															<td style="font-family:’Open Sans’, Arial, sans-serif; font-size:18px; line-height:22px; color:white; text-transform:; letter-spacing:2px; padding-bottom:12px;" valign="top" align="left">
															  <h4> Dear '.$dep_username.'</h4>
															    <p>Thank you for investing with us, your deposit has been processed and approved.</p><br>
															    <p>Purchase: '.$plan.'</p>
															    <p>Amount: $'.$amount_deposited.'</p>
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
															</body></html>';

															if($mail->send()){
																echo "<script type=\"text/javascript\">
																		alert(\"Activated Members Deposit successfully\");
																		window.location = \"admin_dashboard.php?p=pending_investments\"
																		</script>";
															}else{
																echo "<script type=\"text/javascript\">
																	alert(\"could not send mail notification to $dep_username\");
																	window.location = \"admin_dashboard.php?p=pending_investments\"
																	</script>";
															}
														}
													}else{
														echo "<script type=\"text/javascript\">
															alert(\"could not activate deposit\");
															window.location = \"admin_dashboard.php?p=pending_investments\"
															</script>";
													}
											}else{
												echo "<script type=\"text/javascript\">
											alert(\"Invalid deposit plan\");
											window.location = \"admin_dashboard.php?p=pending_investments\"
											</script>";
											}
										}else{
											echo "<script type=\"text/javascript\">
												alert(\"Invalid deposit plan\");
												window.location = \"admin_dashboard.php?p=pending_investments\"
												</script>";
										}
									}
								}else{
									echo "<script type=\"text/javascript\">
									window.alert(\"Invalid reference\");
									</script>";
								}
							}
						?>
						 <?php
							if(isset($_POST['reject_btn'])){
								$hidden_id = $_POST['hidden_id'];
								$empty = "";
								$query = "SELECT * FROM deposits WHERE id = '{$hidden_id}'";
								$run_query = mysqli_query($connection, $query);
								$date78 = date('Y');

								while($result = mysqli_fetch_assoc($run_query)){
									$id_check = $result['id'];
									$user = $result['account_id'];
									$query333 = "UPDATE deposits SET image = '{$empty}', status = '{$empty}' WHERE id =  '{$id_check}'";
									$run_query333 = mysqli_query($connection, $query333);

									if($run_query333 == true){
										$query22 = " SELECT * FROM registration WHERE account_id = '{$user}'";
										$run_query22 = mysqli_query($connection, $query22);

										if(mysqli_num_rows($run_query22) > 0){
											while($result = mysqli_fetch_assoc($run_query22)){
												$email_2 = $result['email'];
												$dep_username = $result['username'];
											}

											$subject = "Deposit Rejection";
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
											$mail->Subject='Wallet: '.$subject;
											$mail->Body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

											<tr>
											<td style="font-family:’Open Sans’, Arial, sans-serif; font-size:18px; line-height:22px; color:white; text-transform:; letter-spacing:2px; padding-bottom:12px;" valign="top" align="left">
											  <h4> Hello '.$dep_username.',</h4>
											  <p> Your Proof of Payment was not accepted,</p>
											  <p>kindly upload new proof for your deposit to be activated.</p>
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
											<td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://agrocapital-management.comagrocapital-management.com/assets/images/insta.png" alt="ig" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:27px;" width="27" border="0" height="26"></a></td>
											<td style="width:6px;" width="6">&nbsp;</td>
											<td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://capstone-finance.com/assets/images/tweet.png" alt="yt" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:26px;" width="26" border="0" height="26"></a></td>
											</tr>
											</tbody></table></td>
											</tr>
											<tr>
											<td style="font-family:’Open Sans’, Arial, sans-serif; font-size:11px; line-height:18px; color:#999999;" valign="top" align="center"><a href="https://agrocapital-management.com/" target="_blank" style="color:#999999; text-decoration:underline;">HOME</a> | <a href="https://agrocapital-management.com/teams.php" target="_blank" style="color:#999999; text-decoration:underline;">TERMS OF SERVICE</a> | <a href="https://agrocapital-management.com/about.php" target="_blank" style="color:#999999; text-decoration:underline;">ABOUT</a><br>
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
													alert(\"Deposit rejected successfully\");
													window.location = \"admin_dashboard.php?p=pending_investments\"
														</script>";
											}else{
												echo "<script type=\"text/javascript\">
												alert(\"could not reject deposit\");
												window.location = \"admin_dashboard.php?p=pending_investments\"
												</script>";
											}
										}
									}else{
										echo "<script type=\"text/javascript\">
											alert(\"could not reject deposit\");
											window.location = \"admin_dashboard.php?p=pending_investments\"
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
