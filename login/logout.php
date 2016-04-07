<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["valid"]);
   unset($_SESSION["timeout"]);
   echo 'Bye!';
   header('Refresh: 2; URL = ../index.php');
?>
