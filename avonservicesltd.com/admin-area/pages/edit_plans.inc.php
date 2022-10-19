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
	if(isset($_POST['submit'])){
		for($j = 0; $j < (int)$_POST["total_num"]; $j++){
			$plan = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['plan'][$j])));
			$minimium = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['minimium'][$j])));
			$maximium = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['maximium'][$j])));
			$id22 = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['id'][$j])));
			$percentage = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['percentage'][$j])));
			$referal_bonus = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['referal_bonus'][$j])));
			$commission = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['commission'][$j])));
			$duration = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['duration'][$j])));
			$payout = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['payout'][$j])));
			$no_of_times = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['no_of_times'][$j])));
			
			$query = "UPDATE plans SET plan ='{$plan}', no_of_times = '{$no_of_times}',minimium ='{$minimium}', maximium ='{$maximium}',percentage ='{$percentage}',referal_bonus ='{$referal_bonus}',commission ='{$commission}',duration ='{$duration}',payout ='{$payout}'  WHERE id = '{$id22}'";
			$query = rtrim($query);
			$run_query = mysqli_query($connection, $query);
		}
		
		if($run_query == true){
			$message = " Updated successfully";
		}else{
			$message_failure = "Sorry could not update plans details";
		}
	}
?>		
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Edit Investment Plans</h1>
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
	<div class="col-sm-12">
		<div class = 'panel panel-primary ch'>
			<div class = 'panel-heading' style="background-color:#003366;"id="demo">
				<?php
					if(isset($message)){
						echo "<p class='text-center' style='color:#fff;font-weight:bold;'>{$message}</p>";
					}
					if(isset($message_failure)){
						echo "<p class='text-center' style='color:#e60000;font-weight:bold;'>{$message_failure}</p>";
					}
				?>
			</div><br/>
			<form class="form-horizontal" action="" method="POST">
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Plan Identification</th>
								<th>Minimium</th>
								<th>Maximium</th>
								<th>Gain %</th>
								<th>Referal %</th>
								<th>Commission</th>
								<th>Duration Time</th>
								<th>Payout Interval</th>
								<th>No of Times</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT * FROM plans";
								$run_query = mysqli_query($connection, $query);
								
								if(mysqli_num_rows($run_query) > 0){
									$x = 0;
									while($result = mysqli_fetch_assoc($run_query)){
										$plan = $result['plan'];
										$minimium = $result['minimium'];
										$maximium = $result['maximium'];
										$id = $result['id'];
										$percentage = $result['percentage'];
										$referal_bonus = $result['referal_bonus'];
										$commission = $result['commission'];
										$duration = $result['duration'];
										$payout = $result['payout'];
										$no_of_times = $result['no_of_times'];
										
										echo "
											<input type='hidden' name='id[]' value='{$id}' class='form-control'>
											<tr>
												<td>
													<div class='input-group'>
														<input type='text' readonly name='plan[]' value='{$plan}' class='form-control'>
													</div>
												</td>
												
												<td>
													<div class='input-group'>
														<input type='text' name='minimium[]' value='{$minimium}' class='form-control'>
													</div>
												</td>
												<td>
													<div class='input-group'>
														<input type='text' name='maximium[]' value='{$maximium}' class='form-control'>
													</div>
												</td>
												<td>
													<div class='input-group'>
														<input type='text' name='percentage[]' value='{$percentage}' class='form-control'>
													</div>
												</td>
												<td>
													<div class='input-group'>
														<input type='text' name='referal_bonus[]' value='{$referal_bonus}' class='form-control'>
													</div>
												</td>
												<td>
													<div class='input-group'>
														<input type='text' name='commission[]' value='{$commission}' class='form-control'>
													</div>
												</td>
												<td>
													<div class='input-group'>
														<input type='text' name='duration[]' value='{$duration}' class='form-control'>
													</div>
												</td>
												<td>
													<div class='input-group'>
														<input type='text' name='payout[]' value='{$payout}' class='form-control'>
													</div>
												</td>
												
												<td>
													<div class='input-group'>
														<input type='text' name='no_of_times[]' value='{$no_of_times}' class='form-control'>
													</div>
												</td>
												
											</tr>
										
										";
										$x++;
									}
								}
							?>
						</tbody>
					</table>
				</div>
				<div class="col-md-12">
					<input type ="hidden" name="total_num" value="<?php echo $x;?>">
					<br><input type="submit" style="margin-left:10px;" class="btn btn-danger" name="submit" value="SAVE">
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-sm-2">
</div>
</div>