<!DOCTYPE html>
<?php
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>
<html>
<head>
	<title>Login - Dawuro</title>
	<meta charset="utf-8" lang="en">
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<?php
			require_once 'functions.php';
			// define variables and set to empty values
			$nameErr = $emailErr = "";
			$name = $email = "";

			$msg = ''; 
            
            if (isset($_POST['submit']) && !empty($_POST['username']) 
               && !empty($_POST['password'])){

				$name = test_input($_POST["username"]);
				 
				$email = test_input($_POST["password"]);

				$sql = "SELECT userid, name, category FROM user where email = '$name' and password = '$email'";

				$result = queryMysql($sql);
				var_dump($result);
				if ($result->num_rows == 1) {
         			$_SESSION['login_user'] = $name; 
         			$_SESSION['user_id'] = $result->fetch_assoc();   

         			$obj = $result->fetch_assoc();
         			echo $obj["name"];
         			var_dump($result->fetch_assoc());
         			//echo $_SESSION['user_id'];  
         			if($result->fetch_assoc()['category'] == 'admin'){
         				header("Location: admin.php");
         				return;
         			}  else{
         				
         				//header("Location: delete.php");
         			}    
     //     			if(isset($_SESSION['url'])) 
					//    $url = $_SESSION['url']; // holds url for last page visited.
					// else 
					//    $url = "index.php"; // default page for 

					// header("Location: $url");
				} else {
				    $msg = "wrong username and password combination";
				}
		}

		?>
	
	<fieldset>
		<legend align="center"><img src="./pictures/logo.png" width="80px" height="80px" id="logo"></legend>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method="post">
			<p>Email</p>
			<p><input type="email" name="username" id="password" required="required"></p>
			<p>Password</p>
			<p><input type="password" name="password" id="password" required="required"></p>
			<p><input type="submit" name="submit" value="LOG IN" id="loginBut"></p>
			<p><a href="">Forgot password?</a> <a href="" class="shift">New here? Sign up</a></p>
			<p id="status"><?php echo $msg; ?></p>
		</form>
	</fieldset>
</body>
</html>