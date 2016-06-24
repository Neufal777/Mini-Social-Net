<?php
	
	include 'connection.php';
	//ri = register information
	$ri = array(
			mysqli_real_escape_string($db_con,$_POST['register_name']),
			mysqli_real_escape_string($db_con,$_POST['register_username']),
			mysqli_real_escape_string($db_con,$_POST['register_email']),
			mysqli_real_escape_string($db_con,$_POST['register_location']),
			mysqli_real_escape_string($db_con, md5($_POST['register_password'])),
			mysqli_real_escape_string($db_con,md5($_POST['register_password_confirm'])),
			mysqli_real_escape_string($db_con,$_POST['register_expertin']),
			mysqli_real_escape_string($db_con,$_POST['register_team'])

		); //array $ri

	$register_day = date('d/M/Y'); 

	if (!empty($ri[0]) && !empty($ri[1]) && !empty($ri[2]) && !empty($ri[3]) && !empty($ri[4]) && !empty($ri[5]) && !empty($ri[6]) && !empty($ri[7])) {
			
			// Check If Passwords match

			if ($ri[4]==$ri[5]) {
					
					if (strlen($ri[0])<6) {
							echo "Your name Must be at least 6 Characters";

					}elseif (strlen($ri[1])<6) {

							echo "Your Username must be At lease 6 Characters";

					}elseif (strlen($ri[2])<6) {
							
							echo "your email must be at least 6 Characters";

					}elseif (strlen($ri[4])<6) {

							echo "Your password must be at least 6 characters";
					}else{

						// check if username & email alredy exists exists
						$check_username = mysqli_query($db_con,"SELECT * FROM users WHERE username='$ri[1]' ");
						$check_email = mysqli_query($db_con,"SELECT * FROM users WHERE email='$ri[2]'");

						if (mysqli_num_rows($check_username)>0) {

								echo "This Username alredy Exists";

						}elseif (mysqli_num_rows($check_email)>0) {
								
								echo "This Email Alredy Exists";
						}else{

							mysqli_query($db_con,"INSERT INTO users

								(name,username,email,location,register_date,expertin,profile_image,password,team,status)
								Values

								 ('$ri[0]','$ri[1]','$ri[2]','$ri[3]','$register_day','$ri[6]','sample.jpg','$ri[4]','$ri[7]','offline')
								");
								

							echo "Registred Correctly";
						}
					}
			}else{
				echo "Your Passwords Don'T match";
			}
	} 


?>