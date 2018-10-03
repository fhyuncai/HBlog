<?php
//error_reporting(0);
//ob_start();
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("Asia/Shanghai");

define('HBLOG_ROOT', dirname(__FILE__));

require_once(HBLOG_ROOT."/includes/hbconfig.php");
require_once(HBLOG_ROOT."/includes/mysqli.php");
require_once(HBLOG_ROOT."/includes/function.php");

$result = explode("|",GetConfig());
define('HBLOG_THEME', HBLOG_ROOT."/content/themes/".$result[5]);