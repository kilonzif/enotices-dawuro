<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dawurodb";
$db = mysqli_connect($servername,$username,$password,$dbname);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>