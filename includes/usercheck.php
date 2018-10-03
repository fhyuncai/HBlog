<?php
session_start();

$arr = user_shell($_SESSION['id'],$_SESSION['user_shell']);
if($arr=="bad"){
	echo '<script>window.location.href="login.php";</script>';
	exit();
}else{
	
}
?>
