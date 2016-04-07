<?php
include "../connection.php";
include "../functions/sessiontracker.php";
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/mystyles.css">
</head>
<form method="post" action="addadmin.php">
	Admin ID:<br>
  <input type="text" name="id" value=""><br>
  Name:<br>
  <input type="text" name="name" value=""><br>
Password:<br>
  <input type="password" name="pass" value=""><br><br>
  <input type="submit" name ="add" value="add"><br>
  </form>
<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if (isset($_POST['add'])){
$id=test_input($_POST['id']);
$name=test_input($_POST['name']);
$pass=md5(test_input($_POST['pass']));
$SQL="INSERT INTO administrators (admin_id,admin_name,admin_password)
VALUES (".$id.",'".$name."','".$pass."');";
mysqli_query($db_handle,$SQL);
$SQLCHECK="SELECT * FROM administrators WHERE admin_id = ".$id." AND admin_password = '".$pass."';";
$checkres=mysqli_query($db_handle,$SQLCHECK);
$numrows=mysqli_num_rows($checkres);
if($numrows>0){
echo "administrator added";
  }
  else{
    echo "an error occurred when adding, please try again";
    echo "<head>
<meta http-equiv=\"refresh\" content=\"20; url=addadmin.php\" />
</head>";
  }
}
?>
</html>
