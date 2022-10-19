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
	<h1><i class="fa fa-archive"></i> ALL ACTIVE MEMBERS</h1>
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
			     <th class='text-cneter'>Name</th>
				 <th class='text-center'>Username</th>
				 <th class='text-center'>Account ID</th>
				 <th class="text-center">Password</th>
				<th class='text-center'>Email</th> 
				<th class='text-center'>Upline</th> 
				<th class='text-center'>User IP</th>
				<th class='text-center'>Wallet address</th>
				<th class='text-center'>Reg Date</th>
				<th class=''>Action</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					$active = 'Online';
					$query22 = " SELECT * FROM registration";
					$run_query22 = mysqli_query($connection, $query22);
					if(mysqli_num_rows($run_query22) > 0){
						$x = 1;
						while($result = mysqli_fetch_assoc($run_query22)){
							 
							$reg_date = $result['reg_date'];
							$email = $result['email'];
							 
							$id = $result['id'];
							$block = $result['block'];
							$status = $result['status'];
							$user = $result['username'];
							$pwd = $result['password_2'];
							$user_idd = $result['account_id'];
							$re = $result['who_refered'];
							$btcaccount = $result['btcaccount'];
							$name = $result['name'];
							$not_blocked = "not blocked";
							$nu = "none";
							$ip = $result['user_ip'];
							if($block == $not_blocked){
								$button = "<input type='submit' name='block_btn' value='Block' class='btn btn-danger'>";
							}else{
								$button = "<input type='submit' name='unblock_btn' value='Unblock' class='btn btn-info'>";
							}
							   
							if($status == "suspended"){
								$fk = "	<input type='submit' name='activate'  value='Activate' class='btn btn-success'>";
							}else{
								$fk = "
								<input type='submit' name='suspend'  value='Suspend user' class='btn btn-alert'>";
							}
							echo "
									<tr>
										<th class='text-center'>$name</td>
										<td class='text-center'>$user</td>
										<td class='text-center'>$user_idd</td>
										<td class='text-center'>$pwd</td>
										<td class='text-center'>$email</td>
										<td class='text-center'>$re</td>
										<td class='text-center'>$ip</td>
										<td class='text-center'>$btcaccount</td>
										<td class='text-center'>$reg_date</td>
										<td><form action='' method='POST'>
										$fk
										$button
										<input type='hidden' name='hidden_id' value='{$id}'>
										<input type='submit' name='delete' value='Delete Account' class='btn btn-info'>
										</form></td>
									</tr>
								";
								$x++;
						}
					}else{
						echo "You have no referals ";
					}
				?>
				<?php 
					if(isset($_POST['delete'])){
						$hidden_id = $_POST['hidden_id'];
						$query = "DELETE FROM registration WHERE id = $hidden_id";
						$run_query = mysqli_query($connection, $query);
						if($run_query == TRUE){
							echo "<script type=\"text/javascript\">
							alert(\"Member deleted\");
							window.location = \"admin_dashboard.php?p=members\"
							</script>";
						}else{
							echo "<script type=\"text/javascript\">
							alert(\"Could not delete member\");
							</script>";
						}
					}
				?>
				  <?php
							if(isset($_POST['block_btn'])){
								$hidden_id = $_POST['hidden_id'];
								$status = "block";
								
								$query = "SELECT * FROM registration WHERE id = '{$hidden_id}'";
								$run_query = mysqli_query($connection, $query);
								
								while($result = mysqli_fetch_assoc($run_query)){
									$id_check = $result['id'];
									$query333 = "UPDATE `registration` SET block = '{$status}' WHERE `id` =  '{$id_check}'";
									$run_query333 = mysqli_query($connection, $query333);
									
									if($run_query333 == true){
										echo "<script type=\"text/javascript\">
											alert(\"blocked member successfully\");
											window.location = \"admin_dashboard.php?p=members\"
											</script>";
									}else{
										echo "<script type=\"text/javascript\">
											alert(\"member not blocked\");
											window.location = \"admin_dashboard.php?p=members\"
											</script>";
									}
								}				
							}
						?>
						<?php
							if(isset($_POST['suspend'])){
								$hidden_id = $_POST['hidden_id'];
								$suspend = "suspended";

								$query = "UPDATE registration SET status = '$suspend' WHERE id = '$hidden_id'";
								$run_query = mysqli_query($connection, $query);
								if($run_query == TRUE){
									echo "<script type=\"text/javascript\">
										alert(\"User suspended\");
										window.location = \"admin_dashboard.php?p=members\"
										</script>";
								}
							}
						?>
						<?php
							if(isset($_POST['activate'])){
								$hidden_id = $_POST['hidden_id'];
								$suspend = "active";
								$query = "UPDATE registration SET status = '$suspend' WHERE id = '$hidden_id'";
								$run_query = mysqli_query($connection, $query);
								if($run_query == TRUE){
									echo "<script type=\"text/javascript\">
										alert(\"User activated\");
										window.location = \"admin_dashboard.php?p=members\"
										</script>";
								}
							}
						?>

						<?php
							if(isset($_POST['unblock_btn'])){
								$hidden_id = $_POST['hidden_id'];
								$status = "not blocked";
								
								$query = "SELECT * FROM registration WHERE id = '{$hidden_id}'";
								$run_query = mysqli_query($connection, $query);
								
								while($result = mysqli_fetch_assoc($run_query)){
									$id_check = $result['id'];
									$query333 = "UPDATE `registration` SET block = '{$status}' WHERE `id` =  '{$id_check}'";
									$run_query333 = mysqli_query($connection, $query333);
									
									if($run_query333 == true){
										echo "<script type=\"text/javascript\">
											alert(\"unblocked member successfully\");
											window.location = \"admin_dashboard.php?p=members\"
											</script>";
									}else{
										echo "<script type=\"text/javascript\">
											alert(\"member not unblocked\");
											window.location = \"admin_dashboard.php?p=members\"
											</script>";
									}
								}				
							}
						?>
			  </tbody>
			  
			</table>
			<form method="POST">
			<?php
				$suspend1 = "suspended";
				$suspend2 = "active";
				$query = "SELECT * FROM registration WHERE status = '{$suspend1}'";
				$run_query = mysqli_query($connection, $query);

				if(mysqli_num_rows($run_query)>0){

					echo "
						<input type='submit' class='btn btn-danger' value='Activate all user' name='at'>
					";
				}else{
					echo "
						<input type='submit' class='btn btn-info' value='Suspend all user' name='su'>
					";
				}
			?>
			<?php
				if(isset($_POST['at'])){
					$s1 = "suspended";
					$s2 = "active";
					$bl = "not blocked";
					$query = "SELECT * FROM registration WHERE status = '{$s1}' AND id = '{$id}'";
					$run_query = mysqli_query($connection, $query);
					if(mysqli_num_rows($run_query)>0){
						while($result = mysqli_fetch_assoc($run_query)){
							$statu = $result['status'];
							$id1 = $result['id'];

							$qu = "UPDATE resgistration SET status = '{$s1}' AND id = '{$id1}' ";
							$ru = mysqli_query($connection, $qu);
							if($ru == TRUE){
								echo "<script type=\"text/javascript\">
									alert(\"Users activated\");
									</script>
								";
							}else{
								echo "<script type=\"text/javascript\">
									alert(\"Can not activate user\");
									</script>
								";
							}

						}
					}
				}
			?>
			<br><br>
</form>
		  </div>
		</div>
	  </div>
	</div>