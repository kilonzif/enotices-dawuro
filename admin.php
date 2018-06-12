<?php
	require_once 'session.php';
	   include('functions.php');
	//session_start();
	$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome - Dawuro</title>
	<meta charset="utf-8" lang="en">
	<link rel="stylesheet" type="text/css" href="css1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
		<div id="smallleft">
			<p class="stylish"><img src="./pictures/logo.png" width="40px" height="40px" align="left">DAWURO</p>
		</div>
		<div id="smallright">
			<p id="userpos"><img src="trial.jpg" width="40px" height="40px" align="center" style="margin-right: 5px;"><span><a href="login.php">LOG OUT</a></span></p>
		</div>
	</header>
	<div id="left">
		<a href="javascript:void(0)" style="padding-left: 0px"><img src="trial.jpg" width="40px" height="40px" align="left" style="border-radius: 100%; margin-right: 5px;"><span>Samuel Agyemang Prempeh</span></a>
		<a href=""><i class="fa fa-home"></i>Home</a>
		<a href="javascript:void(0)" onclick="allEvents()">All Events</a>
		<a href="javascript:void(0)" onclick="approvedEvents()">Approved Events</a>
		<a href="javascript:void(0)" onclick="unapprovedEvents()">Unapproved Events</a>
		<a href="javascript:void(0)" onclick="loadcategories()">Event Categories</a>
		<a href="login.php">Log out</a>
	</div>
	<div id="right">
		<?php echo facebookEvents(); ?>
	</div>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="adminjs.js"></script>
			
</body>
</html>