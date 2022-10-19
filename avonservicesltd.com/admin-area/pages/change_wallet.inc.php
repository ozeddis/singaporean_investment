<?php
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
<?php
	$query = "SELECT * FROM wallets WHERE id = 1";
	$run_query = mysqli_query($connection, $query);

	if(mysqli_num_rows($run_query)>0){
		while($result = mysqli_fetch_assoc($run_query)){
			$id = $result['id'];
			$eth = $result['eth'];
			$btc = $result['bitcoin'];
			$tron = $result['Tron'];
			$dodge = $result['Dodge'];
			$xrp = $result['Ripple (XRP)'];
			$usdt = $result['usdt'];
		}
	}
?>
<?php
	if(isset($_POST['generate'])){
		$sort = uniqid(0);
		$token = str_shuffle($sort);
 		$date78 = date('Y');

		$query = "UPDATE wallets SET token = '{$token}'";
		$run_query = mysqli_query($connection, $query);
		if($run_query == TRUE){
			$email_2 = "support@agrocapital-management.com";
			$subject = "Token";

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
			$mail->Body='
				<div class="container">
					<div class="row" align=justify>
						<div class="col-xs-12">
						<table class="table-responsive">
						<tbody>
								<tr class="container">
								<img class="img-responsive image-rounded" height="40px" width="80" src="https://agrocapital-management.com/img/logo.png" alt="Agro Capital Management">
								</tr>
							</tbody>
							</div>
						</table>
						<div class="col-xs-12">
							<h3> Hello Admin,</h3>
								<p>A wallet change has been reqeusted on your CoinJar Trading Account</p><br>
								<p>Kindly use this token <b>'.$token.' to authorize this change.</p>
								<p>Note: Please ignore if you did not initiate this change.</p>
								<p>©Copyright 2013 - '.$date78.'<br> Agro Capital Management. All rights reserved.</p>
							</div>
							</div>
						</div>';

			if($mail->send()){
				echo "<script type=\"text/javascript\">
						alert(\"Token sent to email\");
						</script>";
			}else{
				echo "<script type=\"text/javascript\">
					alert(\"Could not send token\");
					</script>";
			}
		}
	}
 ?>
 <?php
	if(isset($_POST['save'])){
		$eth = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['eth']))));
		$btc = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['btc']))));
		$usdt = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['usdt']))));
		$xrp = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['xrp']))));
		$dodge = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['dodge']))));
		$tron = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['tron']))));
		$tk = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['token']))));
		if(empty($eth)){
			echo "<script type=\"text/javascript\">
				alert(\"Fill all wallets\");
 				</script>";
		}elseif(empty($btc)){
			echo "<script type=\"text/javascript\">
				alert(\"Fill all wallets\");
 				</script>";
		}elseif(empty($dodge)){
			echo "<script type=\"text/javascript\">
				alert(\"Fill all wallets\");
				</script>";
		}elseif(empty($usdt)){
			echo "<script type=\"text/javascript\">
				alert(\"Fill all wallets\");
				</script>";
		}elseif(empty($xrp)){
			echo "<script type=\"text/javascript\">
				alert(\"Fill all wallets\");
				</script>";
		}elseif(empty($tron)){
			echo "<script type=\"text/javascript\">
				alert(\"Fill all wallets\");
				</script>";
		}else{
			$query = "SELECT * FROM wallets WHERE token = '{$tk}'";
			$run_query = mysqli_query($connection, $query);
			if(mysqli_num_rows($run_query) == 1){
				while($result = mysqli_fetch_assoc($run_query)){
					$id = $result['id'];

					$query1 = "UPDATE wallets SET eth = '{$eth}', bitcoin = '{$btc}', dodge = '{$dodge}' WHERE token ='{$tk}'";
					$run_query1 = mysqli_query($connection, $query1);
					if($run_query1 == TRUE){
						$done = "ok";
						$query2 = "UPDATE wallets SET token = '{$done}' WHERE id = 1";
					 	$run_query2 = mysqli_query($connection, $query2);
						if($run_query2 == TRUE){
							echo "<script type=\"text/javascript\">
								alert(\"Wallet updated\");
								</script>";
						}else{
							echo "<script type=\"text/javascript\">
								alert(\"Undefined error\");
 								</script>";
						}
					}else{
						echo "<script type=\"text/javascript\">
							alert(\"could not update admin details at this time. (error 509) \");
 							</script>";
					}
				}
			}else{
				echo "<script type=\"text/javascript\">
					alert(\"Invalid Token (error 406)\");
 					</script>";
			}
		}
	}
 ?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Update admin wallets</h1>
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
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="card">
			  <div class="card-body">
				<form action="" method="POST">
				  <div class="form-group">
					<label for="modalname1" class="form-label">Bitcoin</label>
					<input type="text" class="form-control" name="btc" value="<?php echo $btc?>" placeholder="Bitcoin wallet" required>
				</div>
				<div class="form-group">
					<label class="form-label">Ethereum</label>
					<input type="text" class="form-control" name="eth" value="<?php echo $eth?>" placeholder="Ethereum wallet" required>
				</div>
				<div class="form-group">
					<label class="form-label">USDT</label>
					<input type="text" class="form-control" name="usdt" value="<?php echo $usdt?>" placeholder="USDT wallet" required>
				</div>
				<div class="form-group">
					<label class="form-label">Dodge</label>
					<input type="text" class="form-control" name="dodge" value="<?php echo $dodge?>" placeholder="Dodge wallet" required>
				</div>
				<div class="form-group">
					<label class="form-label">XRP</label>
					<input type="text" class="form-control" name="xrp" value="<?php echo $xrp?>" placeholder="XRP wallet" required>
				</div>
				<div class="form-group">
					<label class="form-label">Tron</label>
					<input type="text" class="form-control" name="tron" value="<?php echo $tron?>" placeholder="Tron wallet" required>
				</div>

				<div class="form-group">
					<label class="form-label">Token</label>
					<input type="text" class="form-control" value="" placeholder="Token" name="token" >
				</div>
				<button type="submit" class="btn btn-danger" name="generate">Generate Token</button>

				<button type="submit" class="btn btn-primary" name="save">Save</button>

				</form>
			  </div>
			</div>
		  </div>
		<div class="col-md-2">
		</div>
	</div>
</div>
