<?php
@include("hbconfig.php");
if(!isset($mysql_conf)){
die('<script>window.location="install";</script>');
}
$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if ($mysqli->connect_errno) {
    die("Database Error:" . $mysqli->connect_error);//诊断连接错误
}
$mysqli->query("SET NAMES utf8;");//编码转化
$select_db = $mysqli->select_db($mysql_conf['db']);
if (!$select_db) {
    die("DB Error:" .  $mysqli->error);
}