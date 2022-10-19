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
	if(isset($_POST['save_btn'])){
		$usernamew = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['account_id'])));
		$amount = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['amount'])));

		$query = "SELECT * FROM registration WHERE account_id = '{$usernamew}'";
		$run_query = mysqli_query($connection, $query);

		if(mysqli_num_rows($run_query) > 0){
			while($result = mysqli_fetch_array($run_query)){
				$id = $result['id'];
				$wallet = $result['wallet'];
				$account_id = $result['account_id'];

				$transaction = rand(10000000, 99999999);
				$date78 = Date("Y");
				$date = Date("Y-m-d");
				$time = time();
				$time2 = Date("H:i:s", $time);
				$description = "Bonus";
				$status = "debit";

				if(!is_numeric($amount)){
					$message_failure = "Invalid amount";
				}else{
					$query1 = "INSERT INTO wallet (account_id, wallet_address,amount,status,transaction_id,date,time) VALUES ('{$account_id}','{$wallet}','{$amount}','{$status}','{$transaction}','{$date}','{$time2}')";
					$run_query1 = mysqli_query($connection, $query1);

					if($run_query1 == TRUE){
						echo "<script type=\"text/javascript\">
						alert(\"User debited\");
						window.location = \"admin_dashboard.php?p=allocate_bonus\"
						</script>";
					}else{
						$message_failure = "Internal system error!";
					}
				}
			}
		}else{
			$message_failure = "Invalid User id";
		}
	}
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Deduct from wallet</h1>
  </div>
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="admin_dashboard.php">Dashboard</a></li>
	</ul>
  </div>
</div>
<div class="row card">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<div class = 'panel panel-primary ch'>
			<div class = 'panel-heading' style="background-color:#003366;"id="demo">
				<?php
					if(isset($message)){
						echo "<p class='text-center' style='color:#fff;font-weight:bold;'>{$message}</p>";
					}
					if(isset($message_failure)){
						echo "<div class='alert alert-danger  '><p class='text-center'>{$message_failure}</p></div>";
					}
				?>
			</div><br/>
			<div class = 'panel-body'>
				  <div class="card-body">
					<form class="form-horizontal" action="" method="POST">
					  <div class="form-group">
						<label class="control-label col-md-4">Enter User Id</label>
						<div class="col-md-8">
						  <input class="form-control" type="text" name="account_id" value="" placeholder="User id" >
						</div><br><br>
						<label class="control-label col-md-4">Enter Credit amount</label>
						<div class="col-md-8">
						  <input class="form-control" type="text" name="amount" value="" placeholder="debit amount" >
						</div>
					  </div>
						 </div>
						 <div class="form-group">
						  <div class="card-footer">
							<div class="row">
							  <div class="col-md-8 col-md-offset-3">
								<button class="btn btn-primary icon-btn" type="submit" name="save_btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Validate</button>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</form>
				  </div>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
	</div>
</div>
