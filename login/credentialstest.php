<?php
include "../index.php";
include "../connection.php";
echo "<head>
<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/mystyles.css\">
</head>";
if ($db_found) {
$SQL = "SELECT * FROM users WHERE username = '".$name."' AND password= '".$password."'"; 
$SQL2="SELECT surname FROM users WHERE username = '".$name."';";
$myres=mysqli_query($db_handle,$SQL2);
$myarr=mysqli_fetch_assoc($myres);
$dispName=$myarr['surname']; 
$result = mysqli_query($db_handle,$SQL);
$numrows=mysqli_num_rows($result);  
if($numrows>0){
	$myres=mysqli_query($db_handle,$SQL);
	$myarr=mysqli_fetch_assoc($myres);
    $access=$myarr['access'];
	$_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = $name;
    $_SESSION['displayname']= $dispName;
    $_SESSION['access']=$access;
echo "<head>
<meta http-equiv=\"refresh\" content=\"2; url=../interface/homepage.php\" />
</head>
<center>logged in</center>
";
}
else{
	echo "<head>
<meta http-equiv=\"refresh\" content=\"2; url=../index.php\" />
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

