<?php
echo "<head><link rel=\"stylesheet\" type=\"text/css\" href=\"../css/mystyles.css\"></head>";
include "../functions/sessiontracker.php";
include "../connection.php";
print "<form method=\"post\" action=\"scheduleparser.php\" enctype=\"multipart/form-data\" >
	Course:
	<input type=\"text\" name=\"course\" value=\"\"><br>
  Add from this date...:
  <input type=\"date\" name=\"dateStart\" value=\"\"><br>
  ...to this date:
  <input type=\"date\" name=\"dateFin\" value=\"\"><br>
  <input type=\"file\" name=\"timetablefile\" /><br>
 <input type=\"submit\" name=\"add\" value=\"add\">
</form>";
if (isset($_POST['add'])){
	$theDate=strtotime($_POST['dateStart']);
	$theDate2=strtotime($_POST['dateFin']);
	while ($theDate<=$theDate2) {
$filehandle=fopen($_FILES['timetablefile']['tmp_name'],'rb');
$someline=fgetcsv($filehandle,1024);
$course=$_POST['course'];
while(!feof($filehandle)){
$someline2=fgetcsv($filehandle,1024);
$line=fgetcsv($filehandle,1024);//room
$line2=fgetcsv($filehandle,1024);//lect
$line3=fgetcsv($filehandle,1024);//unit
//print("<tr><td>".$line[0]."</td><td>".$line[1]."</td><td>".$line[2]."</td><td>".$line[3]."</td><td>".$line[4]."</td><td>".$line[5]."</td><td>".$line[6]."</td><td>".$line[7]."</td><td>".$line[8]."</td><td>".$line[9]."</td></tr>");
for($x=1;$x<10;$x++) {	
	if($line3[$x]!=$line3[$x-1] && $line3[$x]!=""){
		$startTime=$theDate+getStartTime($x);
		$room=$line[$x];
		$unit=$line3[$x];
		$staffName=$line2[$x];
		$SQLLects="Select staff_no from lecturers WHERE staff_name = '".$staffName."';";
		$res=mysqli_query($db_handle,$SQLLects);
		$myarray=mysqli_fetch_assoc($res);
		$staffNo=$myarray['staff_no'];
		if($line3[$x]!=$line3[$x+1]){
			$endTime=$theDate+getEndTime($x);	
		}
		elseif ($line3[$x]!=$line3[$x+2]) {
			$endTime=$theDate+getEndTime($x+1);
		}
		elseif ($line3[$x]!=$line3[$x+3]) {
			$endTime=$theDate+getEndTime($x+2);
		}
		$ourval1=date('Y-m-d H:i:s',$startTime);
		$ourval2=date('Y-m-d H:i:s',$endTime);
		$SQL = "INSERT INTO schedule (start_time, end_time, room_id, unit_id, course_id, reserved, staff_no) VALUES ( '".$ourval1."', '".$ourval2."', '".$room."', '".$unit."', '".$course."', 0, '".$staffNo."')";
		//echo $SQL;
		mysqli_query($db_handle,$SQL);	
	}
	
}
$theDate=$theDate+86400;
}
$theDate=$theDate+86400;
fclose($filehandle);
}

$filehandle2=fopen($_FILES['timetablefile']['tmp_name'],'rb');
$titles=fgetcsv($filehandle2,1024);
echo "<table border=1><tr> <caption>This Timetable has been added for ".$_POST['course']."</caption>";
for ($x=0; $x<10; $x++) { 
	echo "<th>".$titles[$x]."</th>";
}
echo "</tr>";
while (!feof($filehandle2)) { 
	$myline=fgetcsv($filehandle2,1024);
	echo "<tr>";
	for ($x=0; $x < 10; $x++) { 
		echo "<td>".$myline[$x]."</td>";
}
echo "</tr>";
}
echo "</table>";
fclose($filehandle2);
}
function getStartTime($myVal){
return ($myVal+7)*3600;
}
function getEndTime($myVal){

return ($myVal+8)*3600;
}
mysqli_close($db_handle);
?>