<?php
$title="用户管理";
require_once("common/header.php");



/*
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">用户管理</h1>
                    <div id="gg"></div>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="col-md-6">
            <div class="panel panel-default">
  <div class="panel-heading"><i class="fa fa-plus"></i> 添加用户</div>
  <div class="panel-body">
    <form id="adduser"class="form-inline">
   

    <label for="exampleInputName2">用户名:</label>
    <input type="text" class="form-control" name="username" required>
	<label for="exampleInputName2">密码:</label>
    <input type="text" class="form-control" name="pwd" required>
	<label for="exampleInputName2">姓名:</label>
    <input type="text" class="form-control" name="name" required>
	<label for="exampleInputName2">性别:</label><br>
	<select name="sex" class="form-control">
	<option value ="1">男</option>
	<option value ="2">女</option>
	</select>
    <label for="exampleInputName2">用户组:</label><br>
    <select name="ug" class="form-control">
	<option value ="2">社长</option>
	<option value ="3">老师</option>
	<option value ="4">副社长</option>
	<option value ="5">成员</option>
	</select>
	<label for="exampleInputName2">年级:</label>
	<select name="grade" class="form-control">
	<option value ="1">高一</option>
	<option value ="2">高二</option>
	<option value ="3">高三</option>
	</select>
	<label for="exampleInputName2">班级:</label>
    <input type="text" class="form-control" name="class">
	<label for="exampleInputName2">社团ID:</label>
    <input type="text" class="form-control" name="assnid">
	<label for="exampleInputName2">届数:</label>
    <input type="text" class="form-control" name="session">
  <br><br>
  <a class="btn btn-primary btn-block" onclick="adduser();">添加用户</a>
  <br>
</form>
</div></div></div>
            <div class="col-md-6">
            <div class="panel panel-default">
  <div class="panel-heading"> 说明</div>
  <div class="panel-body">
    文案监修中...
  </div>
</div>
<!--搜索（未来版本）-->
</div>


            <!-- /.row -->
            <div class="table-responsive">
            
             <table class="table table-striped table-bordered table-hover">
              <thead>
               <tr>
               <th> <input type="checkbox" onclick="selectAll(this);"  /></th>
                  <th>UID</th>
                   <th>用户名</th>
                    <th>姓名</th>
                     <th>性别</th>
                     <th>用户组</th>
					 <th>社团ID</th>
					 <th>班级</th>
					 <th>届数</th>
                  <th>操作</th>
                   </tr>
                 </thead>
               <tbody>
<?php
$User_Query = $mysqli->query("SELECT * FROM scitg_user");
$User_Num = mysqli_num_rows($User_Query);
if($User_Num > 0){
	while ($row = mysqli_fetch_array($User_Query)) {
		echo '<tr>
        <td><input type="checkbox"name="user"value="'.$row['id'].'"  /></td>
<td>'.$row["id"].'</td>
<td>'.$row["user"].'</td>
<td>'.$row["name"].'</td>
<td>'.GetUserSex($row["sex"]).'</td>
<td>'.GetUserGroup($row["level"]).'</td>
<td>'.$row["assnid"].'</td>
<td>'.GetGrade($row["grade"]).'（）</td>
<td>'.$row["name"].'</td>
<td><button class="btn btn-info"onclick="edituser(\''.$uid.'\',\''.$row["username"].'\',\''.$row["group"].'\',\''.$row["regtime"].'\');">编辑</button> <button onclick="deluser(\''.$uid.'\');"class="btn btn-danger">删除</button></td>
  </tr>';
	}
}
?>
                      </tbody></table> </div>

  <button onclick="delall();"id="s"class="btn btn-danger"><i class="fa fa-times"></i> 删除选中用户</button><br><br>

        <!-- /#page-wrapper -->

   
    <!-- /#wrapper -->

    <!-- jQuery -->

<div class="modal fade bs-example-modal-lg"id="edit"  tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">编辑用户</h4>
      </div>
      <div class="modal-body">
      <form id="euser" class="form-horizontal">
      <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-2 control-label">UID</label>
    <div class="col-sm-10">
    <div id="eeuid"></div>
      <div style="display: none"><input type="text" class="form-control" id="euid"name="euid" disabled/></div>
    </div>
    </div>
	<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="eusername"name="eusername">
    </div>
    </div>
	<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="ename"name="ename">
    </div>
    </div>
	<div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10">
	<select name="esex" id="esex" class="form-control">
	<option value ="1">男</option>
	<option value ="2">女</option>
  </select> 
    </div>
    </div>
    <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">用户组</label>
    <div class="col-sm-10">
	<select name="egroup" id="egroup" class="form-control">
	<option value ="2">社长</option>
	<option value ="3">老师</option>
	<option value ="4">副社长</option>
	<option value ="5">成员</option>
  </select> 
    </div>
    </div>
	<div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">年级</label>
    <div class="col-sm-10">
	<select name="egrade" id="egrade" class="form-control">
	<option value ="1">高一</option>
	<option value ="2">高二</option>
	<option value ="3">高三</option>
  </select> 
    </div>
    </div>
	<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">班级</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="eclass"name="eclass">
    </div>
    </div>
	<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">社团ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="eassnid"name="eassnid">
    </div>
    </div>
	<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">届数</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="eseesion"name="eseesion">
    </div>
    </div>
	<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">设置密码</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="epwd"name="epwd" placeholder="留空表示不更改" />
    </div>
    </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" onclick="saveedit();">保存更改</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>

</html>
<script>
function saveedit(){
      $.post("../includes/adminAction.php",$("#euser").serialize()+"&action=edituser",
  function(data){
    var pe=data.split("|");
    if(pe[0]=="ok"){ 

      $('#edit').modal('toggle');
  iosOverlay({
    text: "修改成功",
    duration: 2e3,
    icon: "images/check.png"
  });
  window.location.reload();
    }else{ 
alert(pe[1]);


 };

});
}
function edituser(uid,username,usergroup,regtime){
$('#edit').modal('toggle');
$("#euid").val(uid);
$("#eeuid").html(uid+"(不可更改)");
$("#eusername").val(username);
$("#eregtime").val(regtime);
$("#egroup").val(usergroup);  
}
 function selectAll(checkbox) {
                $('input[type=checkbox]').prop('checked', $(checkbox).prop('checked'));
            }

function changeURLArg(url,arg,arg_val){ 
    var pattern=arg+'=([^&]*)'; 
    var replaceText=arg+'='+arg_val; 
    if(url.match(pattern)){ 
        var tmp='/('+ arg+'=)([^&]*)/gi'; 
        tmp=url.replace(eval(tmp),replaceText); 
        return tmp; 
    }else{ 
        if(url.match('[\?]')){ 
            return url+'&'+replaceText; 
        }else{ 
            return url+'?'+replaceText; 
        } 
    } 
    return url+'\n'+arg+'\n'+arg_val; 
} 
(function ($) {
                $.getUrlParam = function (name) {
                    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                    var r = window.location.search.substr(1).match(reg);
                    if (r != null) return unescape(r[2]); return null;
                }
 })(jQuery);
 var ugnow = $.getUrlParam('g');
  var p = $.getUrlParam('page');
   var s = $.getUrlParam('s');
   var f = $.getUrlParam('f');
if(ugnow == null){
$("#ug ").val("all");  
}else{
$("#ug ").val(ugnow);  
}
$("#ug").change(function(){
var ugnew = $("#ug").val();
var urlnew = changeURLArg('user.php?page=1'+"&s="+s+"&g=1",'g',ugnew);
window.location.href=urlnew; 
});
function pagesize(){
  var snew=$("#ps").val();
  if(ugnow == null){
    ugnow = "all";
  }
  var urlnew1 = changeURLArg("user.php?page=1&s=10"+"&g="+ugnow,'s',snew);
window.location.href=urlnew1; 
}
function deluser(uid){

  $.post("../includes/adminAction.php",{uid: uid,action: "deluser"},
  function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 
alert(pe[1]);
window.location.reload();
    }else{ 
alert(pe[1]);


 };

});
}

  function delall(){
     var chk_value =[];//定义一个数组    
            $('input[name="user"]:checked').each(function(){  
            chk_value.push($(this).val());   
            });
            $("#s").attr("disabled","true");
            for(key1 in chk_value){ 
                             $.ajax({
             type: "POST",
             url: "../includes/adminAction.php",
             data: {uid: chk_value[key1],action: "deluser"},
             dataType: "text",
             async: false,
             success: function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 

    }else{ 
alert("删除UID:"+key1+"时遇到错误");


 };

                      }
         });
         
            }
            $("#ss").removeAttr("disabled");
          window.location.reload();
  } 
function adduser(){
    $.post("../includes/adminAction.php",$("#adduser").serialize()+"&action=adduser",
  function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 
      $('#adduser')[0].reset();  
  iosOverlay({
    text: "添加成功",
    duration: 2e3,
    icon: "images/check.png"
  });
    }else{ 
alert(pe[1]);


 };

});
}
$("#s-go").click(function(){
    var suser = $("#suser").val();
    var uslnew = "user.php?s="+s+"&search="+suser;
window.location.href=uslnew; 
})

</script>
*/
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">用户管理</h1>
                    <div id="gg"></div>
                    <div class="alert alert-info" role="alert">你可以在这里管理所有用户。</div>

                     <div class="alert alert-danger" role="alert">请先确定要删除的用户，误删将<strong>无法恢复！</strong></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="table-responsive">
             <br>
             <table class="table table-striped table-bordered table-hover">
              <thead>
               <tr>
                  <th>UID</th>
                   <th>用户名</th>
                    <th>姓名</th>
                     <th>性别</th>
                     <th>用户组</th>
                     <th>邮箱</th>
					 <th>操作</th>
                   </tr>
                 </thead>
               <tbody>
        
<?php
$User_Query = $mysqli->query("SELECT * FROM hb_user");
$User_Num = mysqli_num_rows($User_Query);
if($User_Num > 0){
	while ($row = mysqli_fetch_array($User_Query)) {
		if($row['sex'] == 1){
			$UserSex = "男";
		}elseif($row['sex'] == 2){
			$UserSex = "女";
		}
		$getall = GetAllUserGroup();
		$x = 1;
		while(explode("|",$getall)[0] >= $x){
			$grouplist = explode("~~",explode("|",$getall)[$x]);
			if($grouplist[0] == $row['group']){
				$UserGroup = $grouplist[1];
			}
			$x++;
		}
		echo '<tr>
<td>'.$row['id'].'</td>
<td>'.$row['user'].'</td>
<td>'.$row['name'].'</td>
<td>'.$UserSex.'</td>
<td>'.$UserGroup.'</td>
<td>'.$row['mail'].'</td>
<td><a href="./useredit.php?uid='.$row['id'].'"><button class="btn btn-info">编辑</button></a> <button onclick="deluser(\''.$row['id'].'\');"class="btn btn-danger">删除</button></td>
    </tr>
    ';
	}
}
?>

                      </tbody></table>

            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
</body>

</html>
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})

function delnews(id){
 var returnVal = window.confirm("删除操作不可恢复，确定删除此用户？", "确认删除");
if(!returnVal) {
    
}else{ 

  $.post("../includes/adminAction.php",{id: id,action: "deluser"},
  function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 
alert(pe[1]);
window.location.reload();
    }else{ 
alert(pe[1]);


 };

});
}}
</script>