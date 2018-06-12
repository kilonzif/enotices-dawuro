<?php
	require_once 'functions.php';
	session_start();
	$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add event - Dawuro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="dawuro.png" />
	<!--  bootsrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dawuroStyle.css">
	<link rel="stylesheet" type="text/css" href="css1.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
</head>
<body>
<nav class="navbar navbar-default"  class="navbar navbar" style="background-color: #ffffff;">
      <div class="container-fluid" id="mainnav">
        <div class="navbar-header" id="leftlogo">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
          <a class="navbar-brand" href="index.html"> <img src="dawuro.png" id="logoImg" style="display:inline, height: 30px; width: 30px; margin-right: 10px" align="left" >D A W U R O</a>
        </div>
        <div class="collapse navbar-collapse" id="rightnav">
          <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="addEvent.php">Notices</a></li>
                        <li><a href="contact.php">Contact us</a></li>
                        <?php if(isset($_SESSION['user_id'])) echo "<li><a href='login.php'>Log out</a></li>";  else echo "<li><a href='login.php'>Log in</a></li>";?>
                    </ul>
        </div>
      </div>
</nav>
<div id="rightside">
	<a href="addEvent.php">Add an event</a>
	<input type="search" name="searchbut" id="search" onkeyup="loadAgain()"><button onclick="loadAgain()">Search</button>
</div>
<div id="content">
	<!-- retrived from https://codepen.io/khoipro/pen/vNejGo -->
			<?php echo facebookEvents();?>
		<!-- retrived from https://codepen.io/khoipro/pen/vNejGo -->

</div>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
	function loadAgain(){
        var xmlhttp = new XMLHttpRequest();
        var str = document.getElementById('search').value;
        if(str==""){
        	alert("Enter a valid search term");
        }
        else{
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "search.php?q=" + str, true);
        xmlhttp.send();
    }
   }

</script>
</body>
</html>