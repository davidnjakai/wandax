<?PHP
	$user="root";
	$pword="password";
	$server="127.0.0.1"; 
	$db="lecrooms";
	$db_handle=mysqli_connect($server,$user,$pword);
	$db_found=mysqli_select_db($db_handle,$db);
?>