<?php
	
	session_start();
	include 'connection.php';

	$log_out_user = $_SESSION['username'];
	mysqli_query($db_con,"UPDATE users SET status='offline' WHERE username='$log_out_user' ");

	session_destroy();
	header("location: ../index.php");
?>