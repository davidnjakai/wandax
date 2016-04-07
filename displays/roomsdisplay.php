<?php
include "../functions/sessiontracker.php";
?>
<html> 
<head> 
<title>ROOMS</title>
<link rel="stylesheet" type="text/css" href="../css/mystyles.css">
</head> 
<body class="mainpage">
 <?PHP
include "../connection.php";
$SQL="SELECT * FROM rooms";
$result=mysqli_query($db_handle,$SQL);
print "<table border=\"1\">";
print "<tr>
<th>room id</th>
<th>capacity</th>
</tr>
";
while($db_field=mysqli_fetch_assoc($result)){
	print "<tr>";
	print "<td>".$db_field['room_id']."</td>";
	print "<td>".$db_field['room_capacity']."</td>";
	print "</tr>";
	}
	print "</table> <br>";
	mysqli_close($db_handle);
?> 
<a href="../functions/roomchecker.php">Check rooms in use</a>
</body>
</html>