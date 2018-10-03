<?php
require_once("../init.php");
require_once(HBLOG_ROOT."/includes/usercheck.php");
define('HBLOG_ADMIN', dirname(__FILE__));
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?> - HBlog</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script src="js/metisMenu.min.js"></script>
    <link rel="stylesheet" href="css/iosOverlay.css" /> 
    <script type="text/javascript" src="js/iosOverlay.js"></script>
    <script src="js/sb-admin-2.js"></script>
</head>
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">HBlog</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <!-- /.dropdown -->
                <li class="dropdown visible-md-8 hidden-xs">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
            
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> 退出登录</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> 仪表盘</a>
                        </li>
                                                <li>
                            <a href="setting.php"><i class="fa fa-wrench fa-fw"></i> 设置</a>

                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i> 文章相关<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="articlewrite.php">撰写文章</a>
                                </li>
                                <li>
                                    <a href="articlelist.php">文章管理</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> 用户相关<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="userlist.php">用户管理</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <li>
                            <a href="#"><i class="fa fa-send fa-fw"></i> 其他<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="upgrade.php">在线升级</a>
                                </li>
                                <li>
                                    <a href="about.php">关于</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li class="hidden-md-8 visible-xs">
                            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> 退出登录</a>
                        </li>
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>