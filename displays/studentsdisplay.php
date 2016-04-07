<?php
include "../functions/sessiontracker.php";
?>
<html> 
<head> 
<title>STUDENTS</title>
<link rel="stylesheet" type="text/css" href="../css/mystyles.css">
</head> 
<body class="mainpage">
 <?PHP
include "../connection.php";
$SQL="SELECT * FROM students";
$result=mysqli_query($db_handle,$SQL);
print "<table border=\"1\">";
print "<tr>
<th>adm no</th>
<th>surname</th>
<th>other names</th>
<th>course</th>
<th>date of birth</th>
<th>email</th>
<th>phone</th>
<th>password</th>
<th>rep</th>
</tr>
";
while($db_field=mysqli_fetch_assoc($result)){
	print "<tr>";
	print "<td>".$db_field['stud_id']."</td>";
	print "<td>".$db_field['stud_surname']."</td>";
	print "<td>".$db_field['stud_onames']."</td>";
	print "<td>".$db_field['stud_course']."</td>";
	print "<td>".$db_field['stud_dob']."</td>";
	print "<td>".$db_field['stud_email']."</td>";
	print "<td>".$db_field['stud_phone']."</td>";
	print "<td>".$db_field['stud_password']."</td>";
	print "<td>".$db_field['privileged']."</td>";
	print "</tr>";
	}
	print "</table>";
	mysqli_close($db_handle);
?> 
</body>
</html>