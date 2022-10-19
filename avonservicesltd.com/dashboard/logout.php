<?php
	require"../include/server.inc.php";
	
	ob_start();
?>
<?php
	$query = " SELECT * FROM registration WHERE id = '{$_SESSION['user_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$username = $result['username'];
			 
			$off = "Offline";
			$query2 = "UPDATE registration SET status = '{$off}' WHERE username = '{$username}'";
			$run_query2 = mysqli_query($connection, $query2);
			
			if($run_query2 == true){
				session_unset();
				session_destroy();
				header("location:../login.php");
			}else{
				session_unset();
				session_destroy();
				header("location:../login.php");
			}
		}
	}else{
		session_unset();
		session_destroy();
		header("location:../login.php");
	}
?>             