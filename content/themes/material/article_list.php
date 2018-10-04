<?php
require_once("init.php");

if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = 0;
}

$getall = GetArticleList($page);
$x = 1;
while(explode("|",$getall)[0] >= $x){
	$articlelist = explode("~~",explode("|",$getall)[$x]);
	echo '<a href="'.$articlelist[0].'">'.$articlelist[1].'</a><br/>'."\r\n";
	$x++;
}