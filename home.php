<?php
	session_start();

	if (isset($_SESSION['id'])) {
		$s_id = $_SESSION['id'];
		$s_username = $_SESSION['username'];

	}else{
			header("location: index.php");
	}
?>
<?php
	// Get the data of the logged in user
		include 'php/connection.php';
		$get_data =  mysqli_query($db_con,"SELECT * FROM users where id ='$s_id' ");
		// ai = active information
		while ($ai = $get_data->fetch_assoc()) {
				// ad = active (user) data
				$ad = array(
					$ai['name'],
					$ai['username'],
					$ai['email'],
					$ai['expertin'],
					$ai['profile_image'],
					$ai['location'],
					$ai['register_date'],
					$ai['team'],
					$ai['status']
					);

		}
		$dir = 'profile_images/';
?>
<html>
<head>
	<title>Code Share</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src='js/jquery.js'></script>
</head>
<body id='home_body'>
	<?php include 'search_bar.php'; ?>
	<?php  include'lateral_menu.php'; ?>
<?php
				$check_requests = mysqli_query($db_con,"SELECT * FROM friends WHERE user2='$s_username' and status='sent' ");

 ?>
<div id="home_updates_container">
	<h3> <span class='glyphicon glyphicon-user'></span> Friend Requests ( <?php echo mysqli_num_rows($check_requests); ?> )</h3><hr id='linia'>
	<!-- Show all the requests -->
	<?php


		if (mysqli_num_rows($check_requests)>0) {
				
				while ($re = $check_requests->fetch_assoc()) {
						// requests
						$r = array($re['user1'],$re['id']);

						echo "<div id='home_friend_request_individual_container'>
								<h5>$r[0]</h5><br>
								<div id='accept_decline_container'>
								<a href='accept_friend.php?id=$r[1]' id='accept_friend_request'>Accept</a>
								<a href='decline_friend.php?id=$r[1]' id='decline_friend_request'>Decline</a>
								</div>
							</div><!--home_friend_request_individual_container-->";

				}
		}else{
			echo "You Have No requests";
		}
	?>
</div>



<div id="top_body_container"></div>
<div id="middle_body_container"></div>

</body>
</html>



