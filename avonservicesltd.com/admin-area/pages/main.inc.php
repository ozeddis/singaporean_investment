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

	$query = "SELECT * FROM registration WHERE account_id = '{$_SESSION['user']}'";
	$run_query = mysqli_query($connection, $query);

	if(mysqli_num_rows($run_query) > 0){
		while($result = mysqli_fetch_assoc($run_query)){
			$wallet22 = $result['wallet'];
			$email2 = $result['email'];
			$account_id = $result['account_id'];
		}
	}
?>
<?php
	if(isset($_POST['save_btn'])){
		$amount = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['amount'])));
		$wallet = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['wallet'])));
		$transaction = rand(10000000, 99999999);
		$date78 = Date("Y");
		$date = Date("Y-m-d");
		$time = time();
		$time2 = Date("H:i:s", $time);
		$description = "Bonus";

		$query = "SELECT * FROM registration WHERE wallet = '{$wallet}'";
		$run_query = mysqli_query($connection, $query);

		if(mysqli_num_rows($run_query) > 0){
			$status = "debit";
			$query = "INSERT INTO wallet (account_id, wallet_address,amount,status,transaction_id,date,time) VALUES ('{$account_id}','{$wallet}','{$amount}','{$status}','{$transaction}','{$date}','{$time2}')";
			$run_query = mysqli_query($connection, $query);

			if($run_query == true){
                echo "<script type=\"text/javascript\">
                alert(\"Wallet debited\");
                </script>";
			}else{
				echo "<script type=\"text/javascript\">
                alert(\"Wallet could not be debited\");
                </script>";
			}
		}else{
			$message_failure = "Sorry could not give new bonus";
		}

	}
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> DEBIT USERS</h1>
  </div>
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="admin_dashboard.php">Dashboard</a></li>
	</ul>
  </div>
</div>
	<div class="row card">
	  <div class="col-md-12">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8">
				<div class = 'panel panel-primary ch'>
					<div class = 'panel-heading' style="background-color:#003366;" id="demo">
						<?php
							if(isset($message)){
								echo "<p class='text-center' style='color:#fff;font-weight:bold;'>{$message}</p>";
							}
							if(isset($message_failure)){
								echo "<p class='text-center' style='color:#e60000;font-weight:bold;'>{$message_failure}</p>";
							}
						?>
					</div><br/>
					<div class = 'panel-body'>
						  <div class="card-body">
							<form class="form-horizontal" action="" method="POST">
							  <div class="form-group">
								<label class="control-label col-md-4">AMOUNT</label>
								<div class="col-md-8">
								  <input class="form-control" type="text" name="amount" value="" placeholder="AMOUNT" required>
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-md-4">WALLET ADDRESS</label>
								<div class="col-md-8">
								  <input class="form-control" type="text"  readonly name="wallet" value="<?php echo $wallet22;?>" required>
								</div>
							  </div>
								 </div>
								 <div class="form-group">
								  <div class="card-footer">
									<div class="row">
									  <div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary icon-btn" type="submit" name="save_btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>ALLOCATE</button>
									  </div>
									</div>
								  </div>
								</div>
							  </div>
							</form>
						  </div>
					</div>
			</div>
			<div class="col-sm-2">
			</div>
		</div>
	  </div>
	</div>
