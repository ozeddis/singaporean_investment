
<?php
	$query = " SELECT * FROM admin WHERE id = '{$_SESSION['manager_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
		}
	}
?>
<?php
	if(!$_SESSION['manager_id']){
		header("location: ../login.php");
	}
?>
<?php
	if(isset($_POST['pay'])){
			$user = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['username']))));
			$email2 = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['email']))));
			$amount = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['amount']))));
			$wallet = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['wallet']))));

			$transaction_ID = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['trans']))));
 			$date78 = Date("Y");
			if(empty($user)){
				echo "<script type=\"text/javascript\">
					alert(\"Username can not be empty\");
					window.location = \"admin_dashboard.php?p=gen_proof\"
					</script>";
			}elseif(empty($email2)){
				echo "<script type=\"text/javascript\">
					alert(\"Please fill out email\");
					window.location = \"admin_dashboard.php?p=gen_proof\"
					</script>";
			}elseif(!filter_var($email2, FILTER_VALIDATE_EMAIL)){
				echo "<script type=\"text/javascript\">
					alert(\"Email not well formed\");
					window.location = \"admin_dashboard.php?p=gen_proof\"
					</script>";
			}elseif(empty($amount)){
				echo "<script type=\"text/javascript\">
					alert(\"Please specify amount to be withdrawn\");
					window.location = \"admin_dashboard.php?p=gen_proof\"
					</script>";
			}elseif(empty($transaction_ID)){
				echo "<script type=\"text/javascript\">
					alert(\"Please specify amount to be withdrawn\");
					window.location = \"admin_dashboard.php?p=gen_proof\"
					</script>";
			}elseif(empty($wallet)){
				echo "<script type=\"text/javascript\">
				alert(\"Input wallet address\");
				window.location = \"admin_dashboard.php?p=gen_proof\"
				</script>";
			}else{
				$query = "SELECT * FROM registration WHERE email = '{$email2}'";
				$run_query = mysqli_query($connection, $query);

				if(mysqli_num_rows($run_query)==0){
					echo "<script type=\"text/javascript\">
					alert(\"Invalid mail address\");
					window.location = \"admin_dashboard.php?p=gen_proof\"
					</script>";
				}else{

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
						$mail->addAddress($email2);
						$mail->addReplyTo('support@agrocapital-management.com', 'Agro Capital Management');

						$mail->isHTML(true);
						$mail->Subject='Withdrawal: '.$subject;
						$mail->Body='
						<tr>
						<img src="https://agrocapital-management.com/img/logo.png" width="130px" height="90px">
						<td class="em_h20" style="font-size:0px; line-height:0px; height:25px;" height="25">&nbsp;</td>
						<!——this is space of 25px to separate two paragraphs ——>
						</tr>
						<tr>
						<td style="font-family:’Open Sans’, Arial, sans-serif; font-size:18px; line-height:22px; color:white; text-transform:; letter-spacing:2px; padding-bottom:12px;" valign="top" align="left"><h4> Hello '.$user.',</h4>
						<h4>Withdrawal has been made successfully.</h4>
						<p>Wallet Address</p>
						<p><b>'.$wallet.'</b></p>
						<p>Transaction batch is:'.$transaction_ID.' </p>
						<p><b>Amount: $'.$amount.'</b></p>&nbsp;
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
						<td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://capstone-finance.com/assets/images/facebook.png" alt="fb" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#000000; max-width:26px;" width="26" border="0" height="26"></a></td>
						<td style="width:6px;" width="6">&nbsp;</td>
						<td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://capstone-finance.com/assets/images/insta.png" alt="ig" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#000000; max-width:27px;" width="27" border="0" height="26"></a></td>
						<td style="width:6px;" width="6">&nbsp;</td>
						<td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://capstone-finance.com/assets/images/tweet.png" alt="yt" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#000000; max-width:26px;" width="26" border="0" height="26"></a></td>
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
						<td class="em_hide" style="line-height:1px;min-width:700px;background-color:#000000;"><img alt="" src="https://agrocapital-management.com/assets/images/logoIcon/logo.png" style="max-height:1px; min-height:1px; display:block; width:700px; min-width:700px;" width="700" border="0" height="1"></td>
						</tr>
						</tbody></table></td>
						</tr>
						</tbody></table>
						<div class="em_hide" style="white-space: nowrap; display: none; font-size:0px; line-height:0px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
						</body></html>
';

						if($mail->send()){
							echo "<script type=\"text/javascript\">
								alert(\"Proof sent \");
								window.location = \"admin_dashboard.php?p=gen_proof\"
								</script>";
						}else{
							echo "<script type=\"text/javascript\">
							alert(\"could not pay member $$amount\");
							window.location = \"admin_dashboard.php?p=gen_proof\"
							</script>";
						}
					}
				}
			}


?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Send Withdrawal proof</h1>
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
			<table class="table table-hover table-bordered" >
			  <thead>
				 <tr>
					<th class='text-center'>Username</th>
					<th class='text-center'>Email</th>
					<th class='text-center'>Amount</th>
					<th class='text-center'>Wallet address</th>
					<th class='text-center'>Transaction Batch</th>

					<th class=''>Action</th>
			  </thead>
			  <tbody>
			  <tr>
				<form action='' method='POST'>
				<td class='text-center'> <input type='text' placeholder="Username" name='username' class='text-center form-control'  value=''> </td>
				<td class='text-center'> <input type='text' name='email'placeholder="Email"  class='text-center form-control'  value=''> </td>

				<td> <input type='text' name='amount' placeholder="Amount" class='text-center form-control'  value=''>
				</td>
				<td><input type="text" name="wallet" placeholder="Wallet" class="text-center form-control" ></td>
				<td><input type="text" name="trans" placeholder="Transaction " class="text-center form-control" ></td>

				<td> <input type='submit' name='pay' value='Pay' class='btn btn-success'>  </td>
				</form>
