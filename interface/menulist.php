<?php
   session_start();
   if(!isset($_SESSION['username'])){
   	header("Location: ../index.php");
   }
?>
<html>
<head>
<title>LecRoom Manager</title>
<link rel="stylesheet" type="text/css" href="../css/mystyles.css">
</head>
<body class="menulist">
	<ul>
		<a href="mainpage.php" target="mainpage"><li>home</li></a>
		<a href="../startbootstrap-round-about-1.0.4/index.html" target="mainpage"><li>about</li></a>
		<a href="unfinished.php" target="mainpage"><li>achievements</li></a>
		<a href="unfinished.php" target="mainpage"><li>contacts</li></a>
		<a href="../templatemo_476_conquer/index.html" target="mainpage"><li>media</li></a>
		<a href="unfinished.php" target="mainpage"><li>inbox</li></a>
		<a href="unfinished.php" target="mainpage"><li>sent</li></a>
		<?php
		if($_SESSION['access']==1){
			echo "<a href=\"unfinished.php\" target=\"mainpage\"><li>users</li></a>";
			echo "<a href=\"unfinished.php\" target=\"mainpage\"><li>add admin</li></a>";
			echo "<a href=\"unfinished.php\" target=\"mainpage\"><li>add user</li></a>";
		}
		?>
	</ul>
</body>
<footer><a href="../login/logout.php" target="_parent"><li>logout</li></a></footer>
</html>