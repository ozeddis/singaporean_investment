<?php
	if(isset($_POST['NFP'])){
		$plan = "NFP";
		$_SESSION['plan'] = $plan;
		header("location: user_dashboard.php?p=payment");
	}
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Non Farm Payroll Plans</h1>
  </div>
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="user_dashboard.php?p=dashboard">Dashboard</a></li>
	</ul>
  </div>
</div>
<form action="" method="POST">
<div class="row card">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<div class = 'panel panel-primary ch'>
			<div class = 'panel-heading' style="background-color:#1A001A;color:#fff;height:60px;">
				<h3 style="font-weight:700;color:#ffa64d;" class="text-center">NFP<h3>
			</div>
			<div class = 'panel-body text-center'>
				<?php 
									$plan = "NFP";
									$query = "SELECT * FROM plans WHERE plan = '{$plan}'";
									$run_query = mysqli_query($connection, $query);
									
									if(mysqli_num_rows($run_query) > 0){
										while($result = mysqli_fetch_assoc($run_query)){
											$max4 = $result['maximium'];
											$min4 = $result['minimium'];
											$duration4 = $result['duration'];
											$bonus4 = $result['referal_bonus'];
											$percentage4 = $result['percentage'];
										}
									}

								?>
							<span style="color:#ffa64d;font-size:20px;font-weight:700;"><?php echo $percentage4;?>% ROI (1 Month)</span><br><br>
							<span style="color:#000;font-size:20px;font-weight:500;">Minimium Investment: $<?php echo $min4;?></span><br><br>
							<span style="color:#000;font-size:20px;font-weight:500;">Maximium Investment: $<?php echo $max4;?></span><br><br>
							<span style="color:#000;font-size:20px;font-weight:500;">Trade Duration: <?php echo $duration4;?> Trading</span><br><br>
							<span style="color:#000;font-size:20px;font-weight:500;">Trade Duration: 1 month</span><br><br>
							<span style="color:#000;font-size:20px;font-weight:500;">Referal Bonus: <?php echo $bonus4;?>%</span>
			</div>
			<div class = 'panel-footer' style="background-color:#1A001A;">
				<button class="btn btn-info btn-lg btn-block" style="align:center;" type="submit" name="NFP">SELECT</button>
			</div>
		</div>
	</div>
	<div class="col-md-4">
	</div>
</div>
</form>