<?php
	
	include 'connection.php';
// li = login information
	$li = array(mysqli_real_escape_string($db_con,$_POST['login_username']), mysqli_real_escape_string($db_con,md5($_POST['login_password'])));

	if (!empty($li[0]) && !empty($li[1])) {
			// Select user from the database

			$select_user = mysqli_query($db_con,"SELECT * FROM users WHERE username='$li[0]'");

			if (mysqli_num_rows($select_user)>0) {
					while ($log_in = $select_user->fetch_assoc()) {
							
								//sel_user = selected user 
							$sel_user = array(	$log_in['username'],
												$log_in['password'],
												$log_in['name'],
												$log_in['email'],
												$log_in['expertin'],
												$log_in['location'],
												$log_in['register_date'],
												$log_in['profile_image'],
												$log_in['team'],
												$log_in['id'],
												$log_in['status']

								);

							if ($li[0]==$sel_user[0] && $li[1]==$sel_user[1]) {
									
									session_start();

									$_SESSION['id'] = $log_in['id'];
									$_SESSION['name'] = $log_in['name'];
									$_SESSION['username'] = $log_in['username'];
									$_SESSION['email'] = $log_in['email'];
									$_SESSION['expertin'] = $log_in['expertin'];
									$_SESSION['location'] = $log_in['location'];
									$_SESSION['register_date'] = $log_in['register_date'];
									$_SESSION['team'] = $log_in['team'];
									$_SESSION['status'] = $log_in['status'];

									mysqli_query($db_con,"UPDATE users SET status='online' where username='$li[0]' ");
									echo "<script>window.location.href='home.php'</script>";

							}else{
								echo "Incorrect Information";
							}
					}
			}else{
				echo "This User Doesn't Exist";
			}
	}else{
		echo "You Can't Let The Inputs Empty";
	}
?>