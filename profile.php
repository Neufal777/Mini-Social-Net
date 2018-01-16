
<?php
//PAGE THAT SHOWS ALL MY FRIENDS
  session_start();
  //show all my friends
	$friendsUser = $_SESSION['username'];


  require 'php/connection.php';

  $GetUserInformation = mysqli_query($db_con, "SELECT * FROM friends WHERE user2 = '$friendsUser' && status = 'accepted' ");


  if(mysqli_num_rows($GetUserInformation) > 0){

    while($amigos = $GetUserInformation -> fetch_assoc()){

      $colegas = $amigos['user1'];

      echo $colegas ."<br>";
    }
  }

?>
