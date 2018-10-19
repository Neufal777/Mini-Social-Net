<?php

	session_start();
	include 'php/connection.php';

	$friend_request_id = $_GET['id'];

	//Decline friend, database sql
	mysqli_query($db_con,"UPDATE friends SET status='declined' where id='$friend_request_id' ");
	header("location: home.php");
?>
