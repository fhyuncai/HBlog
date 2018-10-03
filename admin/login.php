
﻿<!DOCTYPE html>
<html lang="en">
 <head> 
  <meta charset="UTF-8" /> 
  <title>登陆 - HBlog</title> 
  <meta name="renderer" content="webkit" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon" /> 
  <link rel="stylesheet" href="css/bootstrap.min.css" /> 
  <link rel="stylesheet" href="css/login.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

 </head>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
          <script type="text/javascript" src="js/bootstrap.min.js"></script> 



<body>
<div align="center">
	<div class="headd">
		<div class="logo"></div>
		<div class="logo-text">
			<div class="text-up"><strong>HBlog</strong></div>
			<div class="text-down" align="right">登陆</div>
		</div>
	</div>

	<div class="bd">
		<form id="login" class="dd" method="post">
		  <div class="form-group" >
		    <label class="sr-only" for="exampleInputAmount">Username</label>
		    <div class="input-group">
		      <div class="input-group-addon"><span class="fa fa-user" aria-hidden="true"></span></div>
		      <input style="width:245px;"type="text" class="form-control" name="username" placeholder="用户名">
		    </div>
		  </div>
		    <div class="form-group">
		    <label class="sr-only" for="exampleInputAmount">Password</label>
		    <div class="input-group">
		      <div class="input-group-addon"><span class="fa fa-lock" aria-hidden="true"></span></div>
		      <input type="password" style="width:245px;"class="form-control" name="password" placeholder="密码">
		    </div>
		  </div>
		  <button style="width:285px;"id="login-button"class="btn btn-primary" onclick="login();">登陆</button><br><br>
		  <!--<div align="right">
		  	<a href="mailto:fhyuncai@yuncaioo.com">忘记密码？</a>
		  </div>-->
		</form>
	</div>
</div>


</body>

<script>
function login(){
	$("#login-button").attr("disabled","true");
	$.post("../includes/login.php", $("#login").serialize(), function(data) {
		var ge=data.split(".");
		if(ge[1]=='1'){
			$("#login-button").removeAttr("disabled");
			alert(ge[2]);
		}else if(ge[1]=='999'){
			
		}else if(ge[1]=='2'){
			$("#login-button").html('登陆成功');
			location.href="./index.php";
		}
});}

$(document).keypress(function(e) {
	//回车键事件
	if(e.which == 13) {
		login();
	}
});
</script>