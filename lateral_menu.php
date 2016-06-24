<html>
<head>
	<title></title>
	<script type="text/javascript" src='js/jquery.js'></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style type="text/css">


#home_lateral_menu_container{  position: absolute;  margin-left: 50px; margin-top: 75px; font-size: 13px;  } /*Top 75px;*/
#home_lateral_menu_container > a > ul > li{list-style: none; background-color:#EEEEEE;   padding: 10px; -webkit-transition:.1s;}
#home_lateral_menu_container > a > ul {}
#home_lateral_menu_container > a { text-decoration: none; color: #4D5158;}
#home_lateral_menu_container > a > ul > li:hover{margin-left: 5px; color: #CE3C5C; }
.menu_logos{margin-right: 4px;}


	</style>
</head>
<body>

<div id="home_lateral_menu_container">

		<a href="home.php"><ul><li><span class='glyphicon menu_logos glyphicon-home'> </span> Home</li></ul></a>
		<a id='show_messages'><ul><li><span class='glyphicon menu_logos glyphicon-comment'></span> Messages</li></ul></a>
		<a id='show_notifications'><ul><li><span class='glyphicon menu_logos glyphicon-alert'></span> Notifications</li></ul></a>
		<a id='show_top_users'><ul><li><span class='glyphicon menu_logos glyphicon-stats'></span> Top Users</li></ul></a>
		<a href=""><ul><li><span class='menu_logos glyphicon glyphicon-file'></span> Create Group</li></ul></a>
		<a href=""><ul><li><span class='menu_logos glyphicon glyphicon-cog'></span> Settings</li></ul></a>
		<a href="php/log_out.php"><ul><li><span class='menu_logos glyphicon glyphicon-off '></span> Log Out</li></ul></a>
	</div> <!--home_lateral_menu_container-->


</body>
</html>