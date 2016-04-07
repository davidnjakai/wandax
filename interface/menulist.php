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
		<a href="../displays/scheduledisplay.php" target="mainpage"><li>schedules</li></a>
		<a href="../displays/roomsdisplay.php" target="mainpage"><li>rooms</li></a>
		<a href="../displays/coursesdisplay.php" target="mainpage"><li>courses</li></a>
		<a href="../displays/unitsdisplay.php" target="mainpage"><li>units</li></a>
		<?php
		if($_SESSION['domain']=="admin"){
			echo "<a href=\"../displays/studentsdisplay.php\" target=\"mainpage\"><li>students</li></a>";
			echo "<a href=\"addstudent.php\" target=\"mainpage\"><li>add student</li></a>";
			echo "<a href=\"addlect.php\" target=\"mainpage\"><li>add lecturer</li></a>";
			echo "<a href=\"addadmin.php\" target=\"mainpage\"><li>add admin</li></a>";
			echo "<a href=\"addschedule.php\" target=\"mainpage\"><li>add schedule</li></a>";
			echo "<a href=\"../functions/scheduleparser.php\" target=\"mainpage\"><li>add timetable</li></a>";
		}
		elseif ($_SESSION['domain']=="lecturer" || $_SESSION['priv']==1) {
			echo "<a href=\"addschedule.php\" target=\"mainpage\"><li>add schedule</li></a>";		}
		?>
	</ul>
</body>
<footer><a href="../login/logout.php" target="_parent"><li>logout</li></a></footer>
</html>