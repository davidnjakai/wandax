<?php
include "../functions/sessiontracker.php";
include "../connection.php";
print "<head>
	<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/mystyles.css\">
</head>";
print "<body class=\"mainpage\"><form method=\"post\" action=\"roomchecker.php\">
  Check vacancy at this time:
  <input type=\"datetime-local\" name=\"date\" value=\"\">
 <input type=\"submit\" name=\"check\" value=\"check\">
</form>
";
if ( isset( $_POST['check'] ) ) {
$mytime=date('Y-m-d H:i:s',strtotime($_POST['date']));
}
else{
$mytime=date('Y-m-d H:i:s',time());
}
print "The following classes are in session at this time(".$mytime.")";
$SQL="SELECT * FROM schedule WHERE start_time < '".$mytime."' AND end_time > '".$mytime."'";
$result=mysqli_query($db_handle,$SQL);
print "<table border=\"1\">";
print "<tr>
<th>sch_id</th>
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
	print "</body>";
	mysqli_close($db_handle);

?>
