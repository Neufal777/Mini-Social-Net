<html>
<head>
	<title>Social Code</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src='js/jquery.js'></script>
</head>
<body>
			<div id='index_login_container'>
				<form method='post' id='login_form_information'>
					<input type='text' name='login_username' placeholder='username' class='login_input'>
					<input type='password' name='login_password' placeholder='Password' class='login_input'>
					<button onclick='return false' type='submit' id='login_submit' class='login_button'>Login</button>
					<button onclick='return false' id='show_register_form' class='login_register_button'>Register</button>					
				</form>
				<div id="login_result"></div>
			</div>  <!-- index_login_container -->

			<div id="index_register_container">
				<form method='post' id='register_form_information'>
					<input type='text' name='register_name' placeholder='name' class='register_input'>
					<input type='text' name='register_username' placeholder='username' class='register_input'>
					<input type='text' name='register_email' placeholder='email' class='register_input'>
					<input type='text' name='register_location' placeholder='Location' class='register_input'>
					<select name='register_expertin' class='register_input'>
						<option>Php</option>
						<option>Java</option>
						<option>c++</option>
						<option>Front End</option>
					</select>	
					<input type='password' name='register_password' placeholder='password' class='register_input'>
					<input type='password' name='register_password_confirm' placeholder='Confirm Password' class='register_input'>
					<select name='register_team' class='register_input'>
						<option >Programmer</option>
						<option >Designer</option>
					</select>
					<button onclick='return false'  id='register_submit' class='login_register_button'>Register</button><br><br>
					<button onclick='return false' class='login_button' id='show_login_form'>Login</button>
					<div id="register_result"></div>

				</form>	
			</div>  <!-- index_register_container -->

			<!-- JQUERY EFFECTS -->
			<script type="text/javascript">
				$(document).ready(function(){

						$('#show_register_form').click(function(){
							$('#index_login_container').hide();
							$('#index_register_container').fadeIn();}); //end of the show register

						$('#show_login_form').click(function(){
							$('#index_register_container').hide();
							$('#index_login_container').fadeIn();}); //end of the show Login & hide Register

						// Register form Ajax

						$('#register_submit').click(function(){
							$.ajax({
								type : 'post',
								url : 'php/user_register.php',
								data : $('#register_form_information').serialize(),
								success : function(data){
									$('#register_result').html(data);
								} 
							});
							return false;
						})

						//LOGIN FORM AJAX
						$('#login_submit').click(function(){
							$.ajax({
								type : 'post',
								url : 'php/user_login.php',
								data : $('#login_form_information').serialize(),
								success : function(data){
									$('#login_result').html(data);
								} 
							});
							return false;
						})
				})
			</script>
</body>
</html>


