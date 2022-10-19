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
	<h1><i class="fa fa-archive"></i> Referal List</h1>
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
				 <th class='text-center'>Name</th>
				<th class='text-center'>Email</th>
				<th class='text-center'>Wallet</th>
				<th class='text-center'>Account ID</th>
				<th class='text-center'>Reg Date</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
			  	if(!$_SESSION['userid']){
					echo "<script type=\"text/javascript\">
					alert(\"Undefined error\");
					window.location = \"login.php\"
					</script>";
				  }
			  ?>
				<?php
					$query = "SELECT * FROM registration WHERE account_id = '{$_SESSION['userid']}'";
					$run_query = mysqli_query($connection, $query);
					if(mysqli_num_rows($run_query)>0){
						while($result = mysqli_fetch_array($run_query)){
							$account = $result['account_id'];

							$query = "SELECT * FROM registration WHERE who_refered = '{$account}'";
							$run_query = mysqli_query($connection, $query);
							while($result = mysqli_fetch_array($run_query)){
								$name = $result['name'];
								$email = $result['email'];
								$username = $result['username'];
								$reg_date = $result['reg_date'];
								$wallet = $result['wallet'];

								echo "
								<tr>
								<td class='text-center'>$name</td>
								<td class='text-center'>$email</td>
								<td class='text-center'>$wallet</td>
								<td class='text-center'>$username</td>
								<td class='text-center'>$reg_date</td>
							</tr>
								";
							}
						}
					}else{

					}
				?>
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>