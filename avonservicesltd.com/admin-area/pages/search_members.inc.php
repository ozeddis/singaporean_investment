   <?php
	
	require"include/server.inc.php";
?>
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

<div class="page-title">
  <div>
	<h1><i class="fa fa-search"></i> Search Members</h1>
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
				echo "<div class='alert alert-success'><p class='text-center' style='color:green;font-weight:bold;'>{$message}</p></div>";
			}
			if(isset($message_failure)){
				echo "<div class='alert alert-danger'><p class='text-center' style='color:#e60000;font-weight:bold;'>{$message_failure}</p></div";
			}
		?>
		<div class="col-md-2">
		</div>
		
		<div class="col-md-8">
			<div class="card">
			  <div class="card-body">
				<form action="" method="POST">
				    
				  <div class="form-group">
				      <div class="card-body table-responsive">
			<table class="table table-hover table-bordered" id="sampleTable">
			  <thead>
				<tr>
				 <th class='text-center'>Account ID</th>
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
				
				if(isset($_POST['search'])){
					$account_id = ['account_id'];
				    $username = ['name'];
				    $email = ['email'];
				    $status = "pending";
				    
				    $query = "SELECT username, wallet_address, no_of_times, status, times_done, earnings, duration, payout, date, main_money,  FROM registration ORDER BY username";
				    
				    $run_query = mysqli_query($connection, $query);
				    if(mysqli_num_rows($run_query) >0){
				        
				    while($result = mysqli_fetch_assoc($run_query)){
				        $username = $result['username'];
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
						
						$query277 = " SELECT * FROM registration WHERE username = '{$username}'";
							$run_query277 = mysqli_query($connection, $query277);
							
							if(mysqli_num_rows($run_query277) > 1){
							    while($result = mysqli_fetch_assoc($run_query277)){
							        $username = $result['username'];{
							   echo "<tr>
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
									</tr>"; 
							        }
							    }
							}else{
							    echo "Record not found";
							}
			            }
        			}
        		}
            	?>
            	<form method='POST' >
					<label for="modalname1" class="form-label">Username</label>
					<input type="text" class="form-control" name="search" placeholder="Search" required>
						<input type="hidden" name="email">
				
				
				<br><button type="submit" class="btn btn-primary" name="search">Search</button><br>
				</form>