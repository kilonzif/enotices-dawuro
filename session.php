<?php
   include('functions.php');
   session_start();
   
   $user_check = $_SESSION['user_id'];

	$result = queryMysql("SELECT userid, name FROM user where email = '$user_check'");

   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }

   $inactive = 600;
   if(isset($_SESSION['timeout'])){
   		$session_life = time() - $_SESSION['timeout'];
   		if($session_life > $inactive){
   			session_destroy();
   			header("Location:login.php");
   		}
   }
   $_SESSION['timeout'] = time();
?>