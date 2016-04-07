<?php
include "../functions/sessiontracker.php";
?>
<html> 
<head> 
<title>COURSES</title>
<link rel="stylesheet" type="text/css" href="../css/mystyles.css">
</head> 
<body class="mainpage">
 <?PHP
include "../connection.php";
$SQL="SELECT * FROM courses";
$result=mysqli_query($db_handle,$SQL);
print "<table border=\"1\">";
print "<tr>
<th>course id</th>
<th>course name</th>
</tr>
";
while($db_field=mysqli_fetch_assoc($result)){
	print "<tr>";
	print "<td>".$db_field['course_id']."</td>";
	print "<td>".$db_field['course_name']."</td>";
	print "</tr>";
	}
	print "</table>";
	mysqli_close($db_handle);
?> 
</body>
</html>