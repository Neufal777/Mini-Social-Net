<!-- COMPONENTS -->


<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php include'search_bar.php'; ?>
<?php include 'lateral_menu.php'; ?>
<body id='seacrh'>
	<div id="all_results_container">
		<?php
	session_start();
	include 'php/connection.php';

	if (isset($_SESSION['id'])) {


			$searched = mysqli_real_escape_string($db_con,$_GET['search']);
			$select_searched = mysqli_query($db_con,"SELECT *  FROM users WHERE name LIKE '%$searched%' or username  LIKE  '%$searched%' or expertin  LIKE  '%$searched%' or team  LIKE  '%$searched%' ");

			if (mysqli_num_rows($select_searched)>0) {
					
					while ($s_q = $select_searched->fetch_assoc()) {

							// Searched information
							$si = array($s_q['name'],$s_q['username'],$s_q['email'],$s_q['id'],$s_q['expertin'],$s_q['profile_image'],$s_q['team']);
							$active = $_SESSION['username'];

							$check_if_alredy_friends = mysqli_query($db_con,"SELECT * FROM friends WHERE user1= '$active' and user2='$si[1]' or user1='$si[1]' and user2='$active'  ");

							echo "<div id='each_result_container'>
										<span id='each_result_name'>$si[0]  [ $si[1] ]</span>
												<div id='each_result_profile_image'></div>
														<div id='each_result_expertin'>[ $si[4] $si[6] ]</div>
													
											";?>
												<?php
													if ($active==$si[1]) {
														echo "";
													}elseif (mysqli_num_rows($check_if_alredy_friends)>0) {

														while ($status= $check_if_alredy_friends->fetch_assoc()) {
																
																$stat = array($status['status']);

																if ($stat[0]=='sent') {
																	echo "<a onclick='return false' class='each_result_request_sent' >Request Sent</a>";

																}elseif ($stat[0]=='accepted') {
																	echo "<a onclick='return false' class='each_result_friends' >Alredy Friends</a>";}
														}
													}else{
														echo "<a type='submit' id='$si[3]' class='each_result_add_user' href='php/add_friend_request.php?add_user=$si[1]'>Add Friend</a>";
													}
												?>
											<?php echo "
													
								  </div> <!--each_result_container-->"		;

						
					}
			}else{
				echo "<h5>We Found 0 Results</h5>";
			}
	}else{
		header("location: index.php");
	}

?>

	</div>
	<script type="text/javascript">
		// Send a friend 

		$(document).ready(function(){

			$('.each_result_add_user').click(function(){
					event.preventDefault();
					$.ajax({
						url : $(this).attr('href'),
						success: function(){
							
						}
					})
					return false;
				});

		})
	</script>

</body>
</html>


