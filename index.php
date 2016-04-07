<?php
   session_start();
?>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="css/mystyles.css">
</head>
<body> 

<?php
$nameErr = $passwordErr = $domainErr = "";
$name = $password = $domain = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
   }
   
   if (empty($_POST["password"])) {
     $passwordErr = "password is required";
   } else {
     $password = md5(test_input($_POST["password"]));
   }

   if (empty($_POST["domain"])) {
     $domainErr = "domain is required";
   } else {
     $domain = test_input($_POST["domain"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<center>
<h2>Welcome!</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="login/credentialstest.php"> 
   ID: <input type="text" name="name" value="<?php echo $name;?>" placeholder = "71234">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Password: <input type="password" name="password" value="<?php echo $password;?>" placeholder = "password..." >
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
   domain:
	<input type="radio" name="domain" <?php if (isset($domain) && $domain=="student") echo "checked";?>  value="student">Student
   <input type="radio" name="domain" <?php if (isset($domain) && $domain=="lecturer") echo "checked";?>  value="lecturer">Lecturer
   <input type="radio" name="domain" <?php if (isset($domain) && $domain=="admin") echo "checked";?>  value="admin">Admin
   <span class="error">* <?php echo $domainErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Login"> 
</form>
</center>
</body>
</html>
