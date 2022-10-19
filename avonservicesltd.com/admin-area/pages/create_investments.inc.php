<?php
	$query = " SELECT * FROM admin WHERE id = '{$_SESSION['manager_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$username = $result['username'];
			$emailer = $result['email'];
			$password = $result['password'];
		}
	}
?>
<?php
	if(isset($_POST['save_btn'])){
		$dep_id = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['dep_user'])));
    $dep_amount = ucwords(htmlentities(htmlspecialchars(trim(mysqli_real_escape_string($connection, $_POST['amount'])))));
    $depositor = ucwords(htmlentities(htmlspecialchars(trim(mysqli_real_escape_string($connection, $_POST['dep_user'])))));
    $plan = ucwords(htmlentities(htmlspecialchars(trim(mysqli_real_escape_string($connection, $_POST['plan'])))));
    $Autoloaders = htmlentities(htmlspecialchars(trim(mysqli_real_escape_string($connection, $_POST['mode']))));
  

    $i = "SELECT * FROM registration WHERE account_id = '{$dep_id}'";
    $r = mysqli_query($connection, $i);
    while($result = mysqli_fetch_assoc($r)){
      $wallet = $result['wallet'];
      $email = $result['email'];
    }

    if(!is_numeric($dep_amount)){
      $message_failure = "Invalid amount entered";
    }else{
      $query = "SELECT * FROM plans WHERE plan = '{$plan}'";
      $run_query = mysqli_query($connection, $query);
      while($result = mysqli_fetch_assoc($run_query)){
        $id = $result['id'];
        $plan = $result['plan'];
        $minimium = $result['minimium'];
        $maximium = $result['maximium'];
        $percentage = $result['percentage'];
        $referal_bonus2 = $result['referal_bonus'];
        $commission = $result['commission'];
        $duration = $result['duration'];
        $payout = $result['payout'];
        $no_per_rollover = $result['no_of_times'];
      }
      //code goes here...
      $date = date("Y-m-d");
			$time = time();
			$time2 = date("H:i:s", $time);
			$date22 = Date("Y-m-d H:i" , $time);
			$depositor14 = "MB Account";
			$depositor2 = "Deposit from admin";
			$transaction_id = rand(111111111,999999999);
			$active = "active";
			$pending = "pending";
			$empty = "";
			$image = "approved transaction";
			$times_done = 0;
			$earnings = 0;
      $paid = "debit";
			$start1 = "start";
			$start2 = "no";
			$date78 = date("Y");
  	//calculations
  		$gain = ($dep_amount * $percentage) / 100;
  		$commission2 = ($dep_amount * $commission) / 100;
  		$no_of_times = $no_per_rollover;
  		$amount_withdrawal = ($gain * $no_per_rollover) - $commission2;
  		$mul = $gain * $no_of_times;
  		$amount_per_times = ($mul - $commission2) / $no_of_times;
  		$amount_remaining = $gain;
  		$main_money = $dep_amount;
  		$amount_earned = ($gain * $no_per_rollover) - $commission2;
  		$dura = $duration;
  		$amount_withdrawn = 0;
  		$pay = $payout;
  		$referal_bonus = ($dep_amount * $referal_bonus2) / 100;

      if($dep_amount < $minimium){
  			echo "<script type=\"text/javascript\">
  			alert(\"Enter amount greater or equal to $$minimium\");
  			window.location = \"admin_dashboard.php?p=create_investments\"
  			</script>";
  		}elseif($dep_amount > $maximium){
  			echo "<script type=\"text/javascript\">
  			alert(\"Enter amount equal or less than $$maximium\");
  			window.location = \"admin_dashboard.php?p=create_investments\"
  			</script>";
  		}else{
        //next code goes here..
        $query101 = "INSERT INTO wallet (account_id, wallet_address, amount, status, transaction_id, date, time) VALUES ('{$depositor}', '{$wallet}','{$dep_amount}', '{$pending}','{$transaction_id}','{$time2}','{$date}')";
    		$run_query101 = mysqli_query($connection, $query101);

        $query46 = "INSERT INTO deposits (account_id,amount_deposited,time,date,status,plan,transaction_id,deposit_method,commission,amount_withdrawable,earnings) VALUES ('{$depositor}','{$dep_amount}','{$time2}','{$date}','{$active}','{$plan}','{$transaction_id}','{$depositor2}','{$commission2}','{$amount_withdrawal}','{$amount_earned}')";//debit the account
    		$run_query46 = mysqli_query($connection, $query46);

        if($run_query46 == TRUE){

            if($Autoloaders == "auto"){
              $query48 = "INSERT INTO withdrawal (commission,triger,email,payout,earnings,account_id,wallet_address,no_of_times,amount_per_time,transaction_id,amount_remaining,main_money,duration,amount_paid,status,date,times_done) VALUES ('{$commission2}','{$start1}','{$email}','{$pay}','{$times_done}','{$depositor}','{$wallet}','{$no_of_times}','{$amount_per_times}','{$transaction_id}','{$amount_remaining}','{$main_money}','{$dura}','{$dep_amount}','{$pending}','{$date22}','{$times_done}')";
				      $run_query48 = mysqli_query($connection, $query48);

              if($run_query48 == TRUE){
                echo "<script type=\"text/javascript\">
          			alert(\"Deposit activated (Rollover = [Automatic])\");
          			window.location = \"admin_dashboard.php?p=create_investments\"
          			</script>";
              }else{
                echo "<script type=\"text/javascript\">
          			alert(\"Deposit activatation failed (Rollover = [NULL])\");
          			window.location = \"admin_dashboard.php?p=create_investments\"
          			</script>";
              }
            }else{
        			echo "<script type=\"text/javascript\">
        			alert(\"Deposit activated (Rollover = [manual])\");
        			window.location = \"admin_dashboard.php?p=create_investments\"
        			</script>";
            }
        }else{
          echo "<script type=\"text/javascript\">
          alert(\"Deposit activatation failed (Rollover = [NULL])\");
          window.location = \"admin_dashboard.php?p=create_investments\"
          </script>";
        }
      }
    }
	}
?>
<div class="page-title">
  <div>
	<h1><i class="fa fa-archive"></i> Create Investments</h1>
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
	<div class="col-sm-8">
		<div class = 'panel panel-primary ch'>
			<div class = 'panel-heading' style="background-color:#003366;"id="demo">
				<?php
					if(isset($message)){
						echo "<p class='text-center' style='color:#fff;font-weight:bold;'>{$message}</p>";
					}
					if(isset($message_failure)){
						echo "<div class='alert alert-danger  '><p class='text-center'>{$message_failure}</p></div>";
					}
				?>
			</div><br/>
			<div class = 'panel-body'>
				  <div class="card-body">
					<form class="form-horizontal" action="" method="POST">
					  <div class="form-group">
						<label class="control-label col-md-4">Select User</label>
						<div class="col-md-8">
              <select name="dep_user" class="form-control">
                <option value="0">--Select Investors Profile--</option>
						  <?php
                $query_dep = "SELECT * FROM registration ORDER BY username ASC";
                $run_query_dep = mysqli_query($connection, $query_dep);
                while($result = mysqli_fetch_assoc($run_query_dep)){
                  $dep_id = $result['account_id'];
                  $dep_name = $result['username'];
                  $ref = $result['who_refered'];
                  $dep_email = $result['email'];
                  $wallet = $result['wallet'];
                  echo "<option value='$dep_id'>$dep_name [$dep_id]</option>
                  ";

                }
              ?></select>
						</div><br><br>
            <label class="control-label col-md-4">Select Investment Plan</label>
						<div class="col-md-8">
              <select name="plan" class="form-control">
                <option value="0">--Select Plan--</option>
						  <?php
                $query_dep = "SELECT * FROM plans ORDER BY minimium ASC";
                $run_query_dep = mysqli_query($connection, $query_dep);
                while($result = mysqli_fetch_assoc($run_query_dep)){
                  $plan = $result['plan'];
                  $min = $result['minimium'];
                  $max = $result['maximium'];
                  if($max > 9000000){
                    $max = "Unlimited";
                  }else{
                    $max = "$".$max;
                  }
                  echo "<option value='$plan'>$plan [$$min - $max]</option>";
                }
              ?>
            </select>
						</div><br><br>
						<label class="control-label col-md-4">Enter deposit amount</label>
						<div class="col-md-8">
						  <input class="form-control" type="text" name="amount" value="" placeholder="$0.00" >
						</div>

						<label class="control-label col-md-4">Select Rollover method</label>
						<div class="col-md-8">
						  <select class="form-control" name="mode">

								<option value="auto">Auto Rollover</option>
								<option value="manual">Manual Rollover</option>
								<!--<option value="ref">Referal commission</option>-->
								<option value="null" selected>--Select--</option>
							</select>
						</div>
					  </div>
						 </div>
						 <div class="form-group">
						  <div class="card-footer">
							<div class="row">
							  <div class="col-md-8 col-md-offset-3">
								<button class="btn btn-primary icon-btn" type="submit" name="save_btn">
									<i class="fa fa-fw fa-lg fa-check-circle"></i>Create Investment</button>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</form>
				  </div>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
	</div>
</div>
