<?php
 	require"../include/server.inc.php";
?>
<?php
	$query = " SELECT * FROM admin WHERE id = '{$_SESSION['manager_id']}'";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
		}
	}
?>
<?php
	if(!$_SESSION['manager_id']){
		header("location: ../login.php");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
	<link rel="icon" type="image/x-icon" href="../assets/logo1.png" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="hustydesigns/sityle.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Agro Capital Management | Admin</title>
  </head>
  <body class="sidebar-mini fixed ">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="admin_dashboard.php"> Agro Capital Management</a>
			<a href=./ class="amk_logo wow fadeInLeft" data-wow-delay="0s"></a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><li class="fa fa-user"></li></div>
            <div class="pull-left info">
              <p><?php echo $username;?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="admin_dashboard.php?p=dashboard_admin"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
			<li><a href="admin_dashboard.php?p=password_change"><i class="fa fa-key"></i><span>Change Password</span></a></li>

			<!--<li><a href="admin_dashboard.php?p=change_wallet"><i class="fa fa-key"></i><span>Change Wallet address</span></a></li>-->
			<li><a href="admin_dashboard.php?p=members"><i class="fa fa-users"></i><span>Members</span></a></li>
			<li><a href="admin_dashboard.php?p=pending_investments"><i class="fa fa-cc-diners-club"></i><span>Pending Deposits</span></a></li>
			<li><a href="admin_dashboard.php?p=pending_withdrawals"><i class="fa fa-cc-diners-club"></i><span>Pending Withdrawals</span></a></li>
			<li><a href="admin_dashboard.php?p=gen_proof"><i class="fa fa-cc-diners-club"></i><span>Generate Proof</span></a></li>
			<li><a href="admin_dashboard.php?p=active_deposits"><i class="fa fa-anchor"></i><span>Active Deposits</span></a></li>
      <li><a href="admin_dashboard.php?p=wallets"><i class="fa fa-google-wallet"></i><span>Wallets</span></a></li>
			<li><a href="admin_dashboard.php?p=allocate_bonus"><i class="fa fa-google-wallet"></i><span>Allocate Bonus</span></a></li>
			<li><a href="admin_dashboard.php?p=deduct"><i class="fa fa-users"></i><span>Deduct from user account</span></a></li>
      <li><a href="admin_dashboard.php?p=create_investments"><i class="fa fa-anchor"></i><span>Create Investments</span></a></li>
			<li><a href="admin_dashboard.php?p=view_investments"><i class="fa fa-anchor"></i><span>Investments</span></a></li>
			<li><a href="admin_dashboard.php?p=edit_plans"><i class="fa fa-anchor"></i><span>Edit Plans</span></a></li>
			<li><a href="admin_dashboard.php?p=news_letter"><i class="fa fa-anchor"></i><span>Bulk Email Sending</span></a></li>
			<li><a href="admin_dashboard.php?p=news_letter_us"><i class="fa fa-anchor"></i><span>Send Newletter to Investor</span></a></li>
			<li><a href="admin_dashboard.php?p=add_members"><i class="fa fa-users"></i><span>Create Members</span></a></li>
			<li><a href="admin_dashboard.php?p=create_admin"><i class="fa fa-anchor"></i><span>Add Admin</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
		<?php
			$pages_dir = 'pages';

			if(!empty($_GET['p'])){
				$pages = scandir ($pages_dir, 0);
				unset ($pages [0], $pages [1]);

				$p = $_GET['p'];

				if(in_array($p.'.inc.php', $pages)){
					include($pages_dir.'/'.$p.'.inc.php');
				}else{
					echo 'sorry, page not found.';
				}
			}else{
				include($pages_dir."/dashboard_admin.inc.php");
			}
		?>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
	<script type="text/javascript" src="js/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>
