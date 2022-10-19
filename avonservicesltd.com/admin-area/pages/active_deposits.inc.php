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
	<h1><i class="fa fa-archive"></i> ALL ACTIVE DEPOSIT</h1>
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
                <th class='text-center'>User ID</th>
                <th class='text-center'>Email</th>   
                <th class='text-center'>Status</th>
				<th class='text-center'>Amount Paid</th>  
				<th class='text-center'>Transaction ID</th>   
				<th class=''>Action</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					$status = "active";
					$query22 = " SELECT * FROM deposits WHERE status = '{$status}'";
					$run_query22 = mysqli_query($connection, $query22);
					if(mysqli_num_rows($run_query22) > 0){
						while($result = mysqli_fetch_assoc($run_query22)){
							$username = $result['account_id'];
							$x = $result['id']; 
							$transaction_id = $result['transaction_id'];
							$amount_deposited = $result['amount_deposited'];
                            $plan = $result['plan']; 
                            $status = $result['status']; 
                            
							$st = "pending";
                            $query = "SELECT * FROM withdrawal WHERE status = '{$st}' AND transaction_id = '{$transaction_id}'";
                            $run_query = mysqli_query($connection, $query);
                            while($result = mysqli_fetch_array($run_query)){
                                $status = $result['status'];
                            }

							$query277 = "SELECT * FROM registration WHERE account_id = '{$username}'";
							$run_query277 = mysqli_query($connection, $query277);
							
							if(mysqli_num_rows($run_query277) > 0){
								while($result = mysqli_fetch_assoc($run_query277)){
                                    $email = $result['email'];
                                    $id = $result['id'];
									$usw = $result['username'];
                                    
								}
							}
							
							echo "
                                <tr>
                                    <td class='text-center'>$usw</td> 
                                    <td class='text-center'>$email</td>  
                                    <td class='text-center'>$status</td>
                                    <td class='text-center'>$amount_deposited</td>
                                    <td class='text-center'>$transaction_id</td> 
                                    <form method='POST'>
                                        <input type='hidden' name='hidden_id' value='$x'>
                                        <input type='hidden' name='trans_id' value='$transaction_id'>
                                        <td> <input type='submit' value='Stop Mining' name='stop' class='btn btn-danger'></td>
                                    </form> 
                                </tr>
								";
						}
					}else{
						echo "You have no investments ";
					}
				?>
				<?php 
					if(isset($_POST['stop'])){
                        $hidden_id = $_POST['hidden_id']; 
                        $transaction_id = $_POST['trans_id'];
                        $stop = "Terminated";
                        
                        $query = "UPDATE withdrawal SET status = '{$stop}' WHERE id = '{$hidden_id}'";
                        $run_query = mysqli_query($connection, $query);

                        if($run_query == TRUE){
                            $query3 = "UPDATE deposits SET status = '{$stop}' WHERE id = '{$hidden_id}'";
                            $run_query3 = mysqli_query($connection, $query3);
    
                            if($run_query3 == TRUE){
                                echo "<script type=\"text/javascript\">
                                    alert(\"Terminated Deposit\")
                                    window.location = \"admin_dashboard.php?p=active_deposits\"
                                </script";
                            }else{
                                echo "<script type=\"text/javascript\">
                                    alert(\"Could not terminate deposit\")
                                    window.location = \"admin_dashboard.php?p=active_deposits\"
                                </script";
                            }
                        }else{
                            echo "<script type=\"text/javascript\">
                            alert(\"Could not Terminate mining session\")
                            window.location = \"admin_dashboard.php?p=active_deposits\"
                        </script";
                        }
					}
				?>
				  
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>