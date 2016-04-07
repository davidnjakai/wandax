<?php
include "../functions/sessiontracker.php";
?>
<html> 
<head> 
<title>ADMINS</title>
<link rel="stylesheet" type="text/css" href="../css/mystyles.css">
</head> 
<body class="mainpage">
 <?PHP
include "../connection.php";
$SQL="SELECT * FROM administrators";
$result=mysqli_query($db_handle,$SQL);
print "<table border=\"1\">";
print "<tr>
<th>admin id</th>
<th>name</th>
<th>password</th>
</tr>
";
while($db_field=mysqli_fetch_assoc($result)){
	print "<tr>";
	print "<td>".$db_field['admin_id']."</td>";
	print "<td>".$db_field['admin_name']."</td>";
	print "<td>".$db_field['admin_password']."</td>";
	print "</tr>";
	}
	print "</table>";
	mysqli_close($db_handle);
?> 
</body>
</html>