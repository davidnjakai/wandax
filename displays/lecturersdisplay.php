<?php
include "../functions/sessiontracker.php";
?>
<html> 
<head> 
<title>LECTURERS</title>
<link rel="stylesheet" type="text/css" href="../css/mystyles.css">
</head> 
<body class="mainpage">
 <?PHP
include "../connection.php";
$SQL="SELECT * FROM lecturers";
$result=mysqli_query($db_handle,$SQL);
print "<table border=\"1\">";
print "<tr>
<th>staff no</th>
<th>name</th>
<th>email</th>
<th>phone</th>
<th>password</th>
</tr>
";
while($db_field=mysqli_fetch_assoc($result)){
	print "<tr>";
	print "<td>".$db_field['staff_no']."</td>";
	print "<td>".$db_field['staff_name']."</td>";
	print "<td>".$db_field['staff_email']."</td>";
	print "<td>".$db_field['staff_phone']."</td>";
	print "<td>".$db_field['staff_password']."</td>";
	print "</tr>";
	}
	print "</table>";
	mysqli_close($db_handle);
?> 
</body>
</html>