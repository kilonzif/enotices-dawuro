<?php
	require_once 'functions.php';
	$q = test_input($_REQUEST['q']);
	echo delete($q);
?>