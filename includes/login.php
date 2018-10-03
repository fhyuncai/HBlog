<?php
session_start();
require("../inc.php");

$pw = $_POST["password"];
$um = $_POST["username"];
if($pw == '' || $um == ''){ 
echo "bad.1.用户名或密码不能为空";
exit();
}
$re = inject_check($pw);
$re1 = inject_check($um);
if($re == "bad" || $re1 == "bad"){exit();}

$query = $mysqli->query("SELECT * FROM hb_user WHERE user = '{$um}' LIMIT 1");
while ($row = mysqli_fetch_array($query)) {
	$usernm = $row['user'];
	$passwd = $row['pass'];
	$userid = $row['id'];
}
if(md5($pw."hblog") == $passwd){
	$_SESSION['id'] = $userid;
	$_SESSION['user_shell'] = md5($usernm.$passwd."hblog");
	echo "ok.2.登陆成功";
}else{
	echo "bad.1.用户名或密码错误";
}
?>