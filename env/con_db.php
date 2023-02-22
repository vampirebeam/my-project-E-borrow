<?php
	$con = mysqli_init();
	@$con = mysqli_connect("localhost","root","abcdefgh","borrow");
	mysqli_query($con, "SET NAMES 'utf8'");
	date_default_timezone_set('Asia/Bangkok');
if ($con->connect_error)
	{
		echo $con -> connect_error;
		exit;
	}
?>