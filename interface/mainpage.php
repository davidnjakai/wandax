<?php
   session_start();
   if(!isset($_SESSION['username'])){
   	header("Location: ../index.php");
   }
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/mystyles.css">
</head>
<body class="mainpage">
<h1>Welcome to LecRoom Manager <?php echo $_SESSION['displayname']; ?> </h1>
</body>
<html>