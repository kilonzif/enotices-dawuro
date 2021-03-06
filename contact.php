<!DOCTYPE html>
<?php
	session_start(); // starts the session
	$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
?>
<html>
<head>
	<title>Dawuro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="dawuro.png" />
	<!--  bootsrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dawuroStyle2.css">
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
          <a class="navbar-brand" href="index.php"> <img src="dawuro.png" id="logoImg" style="display:inline, height: 30px; width: 30px; margin-right: 10px" align="left" >D A W U R O</a>
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
	<div class="backcontact">
		
		<form name="contactForm" action="" method="">
			<div class="col-sm-3">
				
			</div>
			<div class="col-sm-6 form-line">
				<p></p>
	  				<br>
	  				<br>
	  				<p></p>
			 <center><p style="font-family:'Ceviche One', cursive; font-size: 30px;">Get in Touch with us</p>
			 	<p>If you have any questions, please do not hesitate to send us a message.<p>
				<p>We aim to reply within 24 hours.</p>
			 	<p></p>
			 </center>
	  			<div class="form-group">
	  				<label for="exampleInputUsername">Your name</label>
			    	<input type="text" class="form-control" id="" placeholder=" Enter Name" required>
		  		</div>
		  		<div class="form-group">
			    	<label for="exampleInputEmail">Email Address</label>
			    	<input type="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email id" required>
			  	</div>	
			  	<div class="form-group">
			    	<label for="telephone">Mobile No.</label>
			    	<input type="tel" class="form-control" id="telephone" placeholder=" Enter 10-digit mobile no." required maxlength="10">
	  			</div>
	  			<div class="form-group">
	  				<label for ="description"> Message</label>
	  			 	<textarea  class="form-control" id="description" placeholder="Enter Your Message" required></textarea>
	  			</div>
	  			<div>

	  				<button type="button" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
	  				<p></p>
	  				<br>
	  				<br>
	  				<p></p>
	  				
	  			</div>

	  		</div>
	  	</form>
	  	<div class="col-sm-3">	
		</div>
	 
	</div>


	<footer class="row text-center">
		<div class="col-sm-4" id="subscribe">
			<p>Subscribe to our Newsletter</p>
			<div class="input-group">
		         <input type="email" class="form-control" placeholder="Enter your email">
		         <span class="input-group-btn">
		         <button class="btn btn-theme" type="submit" style="border-radius: 0 10px 10px 0;background: #243c4f;color: #fff;" onclick="subscribe()">Subscribe</button>
		         </span>
		    </div>

			
		</div>
		<div class="col-sm-4" id="socialmedia">
			<h4>Follow us on Social media</h4>
	        <a href="#" class="fa fa-facebook"></a>
	        <a href="#" class="fa fa-twitter"></a>
	        <a href="#" class="fa fa-youtube"></a>
	        <a href="#" class="fa fa-instagram"></a>
			
		</div>
		<div class="col-sm-4" id="copyright">
			<p>Copyright 2018@Dawuro</p>
            <p><a href="http://ashesi.edu.gh">
             D A W U R O</a></p>
             <p></p>
			<br><br>
		</div>

	</footer>
</body>
</html>