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
				<th class='text-center'>Username</th>
				 <th class='text-center'>User Id</th>
				 <th class='text-center'>Email</th>
				<th class='text-center'>Wallet Address</th>
				<th class='text-center'>No of Times</th>
				<th class='text-center'>Amount Per Time</th>
				<th class='text-center'>Status</th>
				<th class='text-center'>Times Done</th>
				<th class='text-center'>Earnings</th>
				<th class='text-center'>Amount Paid</th>
				<th class=''>Duration</th>
				<th class=''>Start Date</th>
				<th class=''>Roll over Date</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					$status = "pending";
					$query22 = " SELECT * FROM withdrawal WHERE status = '{$status}'";
					$run_query22 = mysqli_query($connection, $query22);
					if(mysqli_num_rows($run_query22) > 0){
						while($result = mysqli_fetch_assoc($run_query22)){
							$username = $result['account_id'];
							$wallet_address = $result['wallet_address'];
							$no_of_times = $result['no_of_times'];
							$amount_per_time = $result['amount_per_time'];
							$status = $result['status'];
							$times_done = $result['times_done'];
							$earnings = $result['earnings'];
							$duration = $result['duration'];
							$payout = $result['payout'];
							$date = $result['date'];
							$amount234 = $result['main_money'];
							$startdate = strtotime("$date");
							$add_year = strtotime("+$payout",$startdate);
							$new_date = date("Y-m-d H:i:s", $add_year);
							
							
							$query277 = " SELECT * FROM registration WHERE account_id = '{$username}'";
							$run_query277 = mysqli_query($connection, $query277);
							
							if(mysqli_num_rows($run_query277) > 0){
								while($result = mysqli_fetch_assoc($run_query277)){
									$email = $result['email'];
									$usd = $result['username'];
								}
							}
							
							echo "
									<tr>
										<td class='text-center'>$usd</td>
										<td class='text-center'>$username</td>
										<td class='text-center'>$email</td>
										<td class='text-center'>$wallet_address</td>
										<td class='text-center'>$no_of_times</td>
										<td class='text-center'>$amount_per_time</td>
										<td class='text-center'>$status</td>
										<td class='text-center'>$times_done</td>
										<td class='text-center'>$earnings</td>
										<td class='text-center'>$amount234</td>
										<td class='text-center'>$duration</td>
										<td class='text-center'>$date</td>
										<td class='text-center'>$new_date</td>
									</tr>
								";
						}
					}else{
						echo "You have no investments ";
					}
				?>
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>