<?php
	$query = " SELECT * FROM registration WHERE id = '{$_SESSION['admin_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$username = $result['username'];
			$fullname = $result['name'];
			$email = $result['email'];
			$code = $result['referal'];
			$phone = $result['phone'];
			$wallet = $result['wallet'];
			$password = $result['password'];
		}
	}
?>
<?php
	if(isset($_POST['save'])){
		$oldpassword = md5(sha1($_POST['old_password']));
		$newpassword = md5(sha1($_POST['new_password']));
		$repeatpassword = md5(sha1($_POST['repeat']));
		
		if($oldpassword != $password){
			echo "<script type=\"text/javascript\">
					alert(\"Wrong Old Password.\");
					window.location = \"user_dashboard.php?p=change_password\"
					</script>";
		}else if($newpassword != $repeatpassword){
			echo "<script type=\"text/javascript\">
					alert(\"Password do not match\");
					window.location = \"user_dashboard.php?p=change_password\"
					</script>";
		}else if($newpassword == $oldpassword){
			echo "<script type=\"text/javascript\">
					alert(\"You cannot use old password as new password\");
					window.location = \"user_dashboard.php?p=change_password\"
					</script>";
		}else{
			$query = "UPDATE registration SET password = '{$newpassword}' WHERE username = '{$username}'";
			$run_query = mysqli_query($connection, $query);
			
			if($run_query == true){
				echo "<script type=\"text/javascript\">
					alert(\"Password Has Been Changed Successfully.\");
					window.location = \"user_dashboard.php?p=change_password\"
					</script>";
			}else{
				echo "<script type=\"text/javascript\">
					alert(\"Password couldn't be changed at the moment, try again later.\");
					window.location = \"user_dashboard.php?p=change_password\"
					</script>";
			}
		}
	}		
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Change Password</h1>
  </div>
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="user_dashboard.php">Dashboard</a></li>
	</ul>
  </div>
</div>
<div class="container card"> 
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="card">
			  <div class="card-body">
				<form action="" method="POST">
				  <div class="form-group">
					<label for="modalname1" class="form-label">Old Password</label>
					<input type="password" class="form-control" name="old_password" placeholder="Enter old password" required>
				</div>
				<div class="form-group">
					<label class="form-label">New Password</label>
					<input type="password" class="form-control" name="new_password" placeholder="Enter new password" required>
				</div>
				<div class="form-group">
					<label class="form-label">Repeat New Password</label>
					<input type="password" class="form-control" placeholder="Enter new password" name="repeat" required>
				</div>
				<button type="submit" class="btn btn-primary" name="save">Save</button>
				</form>
			  </div>
			</div>
		  </div>
		<div class="col-md-2">
		</div>
	</div>
</div>