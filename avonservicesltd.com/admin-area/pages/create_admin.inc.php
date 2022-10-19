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
	if(isset($_POST['save'])){
		$email = strtolower(htmlentities(trim(mysqli_real_escape_string($connection,$_POST['email']))));
		$user = htmlentities(trim(mysqli_real_escape_string($connection,$_POST['username'])));
		$password = md5(sha1($_POST['password']));
		
		$query = "SELECT * FROM admin WHERE email = '{$email}'";
		$run_query = mysqli_query($connection, $query);
			
		if(mysqli_num_rows($run_query) > 0){
			echo "<script type=\"text/javascript\">
			alert(\"Email exists.\");
			window.location = \"admin_dashboard.php?p=create_admin\"
			</script>";
		}else{
			$query11 = "SELECT * FROM admin WHERE username = '{$user}'";
			$run_query11 = mysqli_query($connection, $query11);
			
			if(mysqli_num_rows($run_query11) > 0){
				echo "<script type=\"text/javascript\">
				alert(\"Username exists.\");
				window.location = \"admin_dashboard.php?p=create_admin\"
				</script>";
			}else{
				$query13 = "INSERT INTO admin (email,username,password) VALUES ('{$email}','{$user}','{$password}')";
				$run_query13 = mysqli_query($connection, $query13);
				
				if($run_query13 == true){
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
	<h1><i class="fa fa-archive"></i> Add Admin</h1>
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
					<label for="modalname1" class="form-label">Email</label>
					<input type="text" class="form-control" name="email" placeholder="Enter an Email" required>
				</div>
				<div class="form-group">
					<label class="form-label">Username</label>
					<input type="text" class="form-control" name="username" placeholder="Enter a username" required>
				</div>
				<div class="form-group">
					<label class="form-label">Password</label>
					<input type="password" class="form-control" placeholder="Enter password" name="password" required>
				</div>
				<button type="submit" class="btn btn-primary" name="save">CREATE ADMIN</button>
				</form>
			  </div>
			</div>
		  </div>
		<div class="col-md-2">
		</div>
	</div>
</div>