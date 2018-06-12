<?php
	require_once 'functions.php';
	$q = test_input($_REQUEST['q']);
    echo facebookEvents("and description like '%$q%' or eventtitle like '%$q%'");
?>