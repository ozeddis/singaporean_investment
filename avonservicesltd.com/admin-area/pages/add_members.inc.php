<?php
	$query = " SELECT * FROM admin WHERE id = '{$_SESSION['manager_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$username = $result['username'];
			$password = $result['password'];
		}
	}
?>
<?php
	if(isset($_POST['save'])){
		
		$username = htmlentities(trim(mysqli_real_escape_string($connection,$_POST['username'])));
		$email = htmlentities(trim(mysqli_real_escape_string($connection,$_POST['email'])));
		$password = md5(sha1($_POST['password']));
		$reg_date = Date("d-M-Y");
		$date78 = date('Y');
		$time = time();
		$time2 = Date("H:i:s", $time);
		$time3 = "{$reg_date} {$time2}";
		$block = "not blocked";
		$desired = 30;
		$desired2 = 10000;
		$uni = uniqid();
		$rand1 = substr($uni, 0, $desired);
		$rand2 = substr(sha1(mt_rand()),17,6);
		$rand3 = substr($uni, 0, $desired2);
		$rand4 = $rand2.$rand3;
		$rand = $rand1.$rand2;
		$online = "online";
		
		
			$query32 = "SELECT * FROM registration WHERE username = '{$username}'";
				$run_query32 = mysqli_query($connection, $query32);
			
			if(mysqli_num_rows($run_query32) > 0){
				echo "<script type=\"text/javascript\">
				alert(\"Username exists.\");
				window.location = \"admin_dashboard.php?p=add_members\"
				</script>";
			}else{
			    $query11 = "SELECT * FROM admin WHERE username = '{$username}'";
			    $run_query11 = mysqli_query($connection, $query11);
			
			if(mysqli_num_rows($run_query11) > 0){
				echo "<script type=\"text/javascript\">
				alert(\"Username exists in Admin.\");
				window.location = \"admin_dashboard.php?p=add_members\"
				</script>";
			}else{
				$query13 = "INSERT INTO registration (password,username,reg_date, reg_time, block,email,referal,wallet) VALUES ('{$password}','{$username}','{$reg_date}', '{$time2}', '{$block}', '{$email}', '{$rand4}','{$rand}')";
				$run_query13 = mysqli_query($connection, $query13);
				
				if($run_query13 == true){
				    $query = "UPDATE registration SET status = '{$online}' WHERE username = '{$username}'";	
				    $message = "Reistration Successful";
				}else{
					$message_failure = "Registration Failed";
				}
			}
		}
	}		
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-users"></i> Create New User</h1>
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
				echo "<p class='text-center' style='color:green;font-weight:bold;'>{$message}</p>";
			}
			if(isset($message_failure)){
				echo "<p class='text-center' style='color:#e60000;font-weight:bold;'>{$message_failure}</p>";
			}
		?>
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="card">
			  <div class="card-body">
				<form action="" method="POST">
				  
				<div class="form-group">
					<label class="form-label">Username</label>
					<input type="text" class="form-control" name="username" placeholder="Enter a username" required>
				</div>
				<div class="form-group">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" placeholder="Enter an Email" required>
				</div>
				<div class="form-group">
					<label class="form-label">Password</label>
					<input type="password" class="form-control" placeholder="Enter password" name="password" required>
				</div>
				<button type="submit" class="btn btn-primary" name="save">Create</button>
				</form>
			  </div>
			</div>
		  </div>
		<div class="col-md-2">
		</div>
	</div>
</div>