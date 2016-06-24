<?php
	
	session_start();
	include 'connection.php';

	$user1 = $_SESSION['username'];

	$user2 = $_GET['add_user'];

	mysqli_query($db_con,"INSERT INTO friends(user1,user2,status) values('$user1','$user2','sent')");
?>