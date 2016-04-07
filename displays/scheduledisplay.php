<?php
include "../functions/sessiontracker.php";
?>
<html> 
<head> 
<title>SCHEDULES</title>
<link rel="stylesheet" type="text/css" href="../css/mystyles.css">
</head> 
<body class="mainpage">
 <?PHP
include "../connection.php";
$SQL="SELECT * FROM schedule";
$result=mysqli_query($db_handle,$SQL);
print "<table border=\"1\">";
print "<tr>
<th>schedule id</th>
<th>start_time</th>
<th>end_time</th>
<th>room_id</th>
<th>unit_id</th>
<th>course_id</th>
<th>reserved</th>
<th>staff_no</th>
</tr>
";
while($db_field=mysqli_fetch_assoc($result)){
	print "<tr>";
	print "<td>".$db_field['sch_id']."</td>";
	print "<td>".$db_field['start_time']."</td>";
	print "<td>".$db_field['end_time']."</td>";
	print "<td>".$db_field['room_id']."</td>";
	print "<td>".$db_field['unit_id']."</td>";
	print "<td>".$db_field['course_id']."</td>";
	print "<td>".$db_field['reserved']."</td>";
	print "<td>".$db_field['staff_no']."</td>";
	print "</tr>";
	}
	print "</table>";
	mysqli_close($db_handle);
?> 
</body>
</html>