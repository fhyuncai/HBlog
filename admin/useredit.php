<?php
$title="用户信息修改";
require_once("common/header.php");

if(!isset($_GET['uid']) || $_GET['uid'] == ''){
	echo '<script>window.location.href="./userlist.php";</script>';
	exit();
}

$userinfo = explode("|",GetUserInfo($_GET['uid']));
?>
      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">用户信息修改</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="table-responsive">
             <br>
<div class="row">
     <form id="useredit">
                 <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">用户名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="u_user" value="<?=$userinfo[1]?>" class="form-control">
                    </div>
              
            </div>
			   <div style="height:10px;"></div>
                 <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">姓名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="u_name" value="<?=$userinfo[2]?>" class="form-control">
                    </div>
              
            </div>
			   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">性别:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <select name="u_sex" class="form-control">
<?php
$x = 1;
while($x <= 2){
	if($x == $userinfo[4]){
		$active = " selected";
	}
	if($x == 1){
		$UserSex['name'] = "男";
	}elseif($x == 2){
		$UserSex['name'] = "女";
	}
	echo '<option value ="'.$x.'"'.$active.'>'.$UserSex['name'].'</option>'."\r\n";
	unset($active);
	$x++;
}
?>
                 </select> 
                    </div>
              
            </div>
			   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">用户组:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <select name="u_group" class="form-control">
<?php
$getall = GetAllUserGroup();
$x = 1;
while(explode("|",$getall)[0] >= $x){
	$grouplist = explode("~~",explode("|",$getall)[$x]);
	if($grouplist[0] == $userinfo[3]){
		$active = " selected";
	}
	echo '<option value ="'.$grouplist[0].'"'.$active.'>'.$grouplist[1].'</option>'."\r\n";
	unset($active);
	$x++;
}
?>
                 </select> 
                    </div>
              
            </div>
			   <div style="height:10px;"></div>
                 <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">邮箱:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="u_mail" value="<?=$userinfo[5]?>" class="form-control">
                    </div>
              
            </div>
			   <div style="height:10px;"></div>
                 <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">密码:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="u_pass" placeholder="留空表示不修改" class="form-control">
                    </div>
              
            </div>
</div></div>
            <!-- /.row -->

            <!-- /.row -->        
                           <div style="height:20px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
   
                    </div>
                 <div class="col-lg-5" align="left">
           <a class="btn btn-lg btn-primary" onClick="save();">修改</a>
                    </div>
                    <div class="col-lg-3" align="right">
        
                    </div>
              
            </div></form>            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

</body>

</html>
<script>
function save(){

$.post("../includes/adminAction.php", "u_id=<?=$userinfo[0]?>&"+$("#useredit").serialize()+"&action=edituser",
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad"){ 
	alert("修改失败，错误信息："+ge[1]);
	}else if (ge[0]=="ok"){
iosOverlay({
		text: "修改成功",
		duration: 2e3,
		icon: "images/check.png"
	});
	window.location.reload();
	}
   });
}
</script>