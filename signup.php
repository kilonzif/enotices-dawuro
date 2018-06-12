<!DOCTYPE html>
	<?php
   		session_start();
	?>
<html>
<head>
	<title>Dawuro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="dawuro.png" />
	<!--  bootsrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="dawuroStyle.css"> -->
	<link rel="stylesheet" type="text/css" href="signupcss.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
</head>
<body>
	<?php
			require_once 'functions.php';
			$msgErr=$msgErr="";
            if (isset($_POST['submit']) && ($_POST['password'])==($_POST['cpassword']) ) {

            	echo "yes!";
            	$name=$_POST['name'];
            	$category=$_POST['category'];
            	$email=$_POST['username'];
            	$password=$_POST['password'];
            	echo $name,$password,$email,$category;
           		$sql = "INSERT INTO user (name, category,email,password) VALUES ('$name','$category','$email','$password')"; 
				$result = queryMysql($sql);
				echo $result;

				if ($result == 1) {
					   unset($_POST);
					   $url = "http://cs.ashesi.edu.gh/~wayne.gakuo/dawuro/login.php"; // go to login page for viewing

					header("Location: $url");
				} else {
				    $msgErr = "wrong entries";
				}


			}
			else{
						// echo "wrong entries!";
						echo $msgErr;
				}


	?>

	<fieldset id="signup">
		<legend align="center"><img src="./pictures/logo.png" width="60px" height="60px" id="logo"></legend>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method="post">
            <p>Name</p>
			<p><input type="text" name="name" id="Name" required="required"></p>
			<p>Email</p>
			<p><input type="email" name="username" id="password" required="required"></p>
			<p>Category</p>
			<p style="color: black;width: 90%;border-radius: 2px;"><select name="category" style="width: 100%;padding: 5px 10px;" required="required">
				<option value="default" selected>Select Category</option>
			    <option value="Student">Student</option>
			    <option value="Staff">Staff</option>
			    <option value="Faculty">Faculty Intern</option>
			</select></p>
			<p>Password</p>
			<p><input type="password" name="password" id="password" required="required"></p>
			<p>Confirm Password</p>
			<p><input type="password" name="cpassword" id="cpassword" required="required"></p>
			<p><input type="submit" name="submit" value="Sign Up" id="signup"></p>
			<p id="status"><?php echo $msgErr; ?></p>
		</form>
	</fieldset>

</body>
</html>