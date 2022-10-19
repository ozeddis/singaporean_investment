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
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> ALL MEMBERS</h1>
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
				 <th class='text-center'>Account ID</th>
				 <th class="text-center">Username</th>
				<th class='text-center'>Wallet Address</th>
				<th class='text-center'>Wallet Balance</th>
				<th>Action</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					$debit = "debit";
					$credit = "credit";
					$query11 = " SELECT * FROM registration ORDER by wallet";
					$run_query11 = mysqli_query($connection, $query11);
					
					while($result = mysqli_fetch_assoc($run_query11)){
						$hidden_id = $result['id'];
						$wallet = $result['wallet'];
						$username = $result['username'];
						$account_id = $result['account_id'];
						
						$query111 = " SELECT * FROM wallet WHERE wallet_address = '{$wallet}' AND status = '{$debit}'";
						$run_query111 = mysqli_query($connection, $query111);
						$amount2 = 0;
						while($result = mysqli_fetch_assoc($run_query111)){
							$amount2 += $result['amount'];
						}
						
						$query112 = " SELECT * FROM wallet WHERE wallet_address = '{$wallet}' AND status = '{$credit}'";
						$run_query112 = mysqli_query($connection, $query112);
						$amount3 = 0;
						while($result = mysqli_fetch_assoc($run_query112)){
							$amount3 += $result['amount'];
						}
						
						$sum = $amount3 - $amount2;
						echo "
							<tr>
								
								
								<form method='POST'>
								<input type='hidden' name='hidden_id' value='$hidden_id'>
								<td class='text-center'>$account_id</td>
								<td class='text-center'>$username</td>
								<td class='text-center'>$wallet</td>
								<td class='text-center'><input type='text' name='balance' value=' $sum'></td>
									<td cclass='text-center'><input disabled type='submit' name='empty' class='btn btn-danger' restricted value='Empty account balance'>
								</form>
							</tr>
						";
					}
					
				?>
				<?php
					if(isset($_POST['empty'])){
						 $id = $_POST['hidden_id'];
						 $acc = $_POST['balance'];
						 if(empty($acc)){
							 echo "<script type=\"text/javascript\">
							 alert(\"Account must be greater or equal zero (0)\");
							 </script>";
						 }elseif(is_numeric($acc)){
							 $debit = "debit";
							$query = "INSERT INTO wallet (account_id, wallet_address, amount, status) VALUES ('{$account_id}', '{$wallet}', '{$acc}', '{$debit}')";
							$run_query = mysqli_query($connection, $query);
							if($run_query == TRUE){
								echo "<script type=\"text/javascript\">
								alert(\"Wallet Updated\");
								window.location = \"admin_dashboard.php?p=wallets\"
								</script>";
							}else{
								echo "<script type=\"text/javascript\">
								alert(\"Failed to debit wallet\");
								</script>";
							}
						 }else{
							echo "<script type=\"text/javascript\">
							alert(\"Invalid amount\");
							</script>";
						 }
					}
				?>
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>