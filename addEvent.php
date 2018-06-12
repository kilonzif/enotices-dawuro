
<!DOCTYPE html>
<?php
	//session_start(); // starts the session
	$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
	//require_once 'functions.php';
	require_once 'session.php';
?>
<html>
<head>
	<title>Add event - Dawuro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="dawuro.png" />
	<!--  bootsrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dawuroStyle.css">
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
            <li><a href="notices.php">Notices</a></li>
            <li><a href="contact.php">Contact us</a></li>
          </ul>
        </div>
      </div>
</nav>
	<form class="form-group" enctype="multipart/form-data" onsubmit="return validate()" id="insertform">
		 <label for="inputEmail4">Title</label><br>
	      <input type="eventtitle" class="form-control" id="eventtitle" placeholder="Event Title" name="title" required="required"><br>
		  <label for="Category">Category</label><br>
	      <select class="form-control" name="eventcategories" id="eventcategories" required="required">
	        <?php echo loadCategories(); ?>
	      </select><br>
	      <label for="descr">Description</label><br>
	      <textarea type="textarea" class="form-control" id="eventdescription" placeholder="Event Description" name="description" required="required"></textarea><br>
	      <label>Date</label><br>
	       <input type="date" class="form-control" id="eventdate" placeholder="Date" name="date" required="required"><br>
	       <label>Time</label><br>
	       <input type="time" class="form-control" id="eventtime" placeholder="Time" name="time" required="required"><br>
	       <label>Venue</label><br>
	       <input type="text" class="form-control" id="eventvenue" placeholder="Venue" name="venue" required="required"><br>
	       <label>Event flyer</label>
	       <input type="file" name="image" id="eventimage" onchange="preview(event)" required="required" accept="image/*">
	       <img src="" width="250px" height="200px" id="view" style="display: none">
	       <p style="margin-top: 30px; margin-bottom: 50px;"><input type="submit" name="submitbut" value="Add Event"></p>
	       <p id="status"></p>
		
	</form>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="mainjs.js"></script>
</body>
</html>