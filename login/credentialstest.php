<?php
include "../index.php";
include "../connection.php";
echo "<head>
<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/mystyles.css\">
</head>";
if ($db_found) {
if($domain=="lecturer"){ 
$SQL = "SELECT * FROM lecturers WHERE staff_no = '".$name."' AND staff_password= '".$password."'"; 
$SQL2="SELECT staff_name FROM lecturers WHERE staff_no = '".$name."';";
$myres=mysqli_query($db_handle,$SQL2);
$myarr=mysqli_fetch_assoc($myres);
$dispName=$myarr['staff_name'];
} 
else if($domain=="student"){ 
$SQL = "SELECT * FROM students WHERE stud_id = '".$name."' AND stud_password= '".$password."'";
$SQL2 = "SELECT stud_surname,privileged FROM students WHERE stud_id = '".$name."';";
$myres=mysqli_query($db_handle,$SQL2);
$myarr=mysqli_fetch_assoc($myres);
$dispName=$myarr['stud_surname'];
$priv=$myarr['privileged'];
} 
else if($domain=="admin"){ 
$SQL = "SELECT * FROM administrators WHERE admin_id = '".$name."' AND admin_password= '".$password."'"; 
$SQL2="SELECT admin_name FROM administrators WHERE admin_id = '".$name."';";
$myres=mysqli_query($db_handle,$SQL2);
$myarr=mysqli_fetch_assoc($myres);
$dispName=$myarr['admin_name'];
}
$result = mysqli_query($db_handle,$SQL);
$numrows=mysqli_num_rows($result);  
if($numrows>0){
	$myres=mysqli_query($db_handle,$SQL);
	$myarr=mysqli_fetch_assoc($myres);

	$_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = $name;
    $_SESSION['displayname']= $dispName;
    $_SESSION['domain']=$domain;
    if($_SESSION['domain']=="student"){
    	$_SESSION['priv']=$priv;
    }
echo "<head>
<meta http-equiv=\"refresh\" content=\"2; url=../interface/homepage.php\" />
</head>
<center>logged in</center>
";
}
else{
	echo "<head>
<meta http-equiv=\"refresh\" content=\"2; url=../interface/homepage.php\" />
</head>";
echo  "<center>invalid user details</center>";
}
mysqli_close($db_handle);
}
else {
mysqli_close($db_handle);
print "<center>db not found<center>";
}
?>

