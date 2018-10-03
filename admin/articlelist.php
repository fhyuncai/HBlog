<?php
$title="文章管理";
require_once("common/header.php");
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">文章管理</h1>
                    <div id="gg"></div>
                    <div class="alert alert-info" role="alert">你可以在这里管理所有文章。</div>

                     <div class="alert alert-danger" role="alert">请先确定要删除的文章，误删将<strong>无法恢复！</strong></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="table-responsive">
             <br>
             <table class="table table-striped table-bordered table-hover">
              <thead>
               <tr>
                  <th>ID</th>
                  <th>标题</th>
                  <th>分类</th>
                  <th>浏览次数</th>
                  <th>作者</th>
                  <th>修改时间</th>
				  <th>操作</th>
                   </tr>
                 </thead>
               <tbody>
        
<?php
$List_Query = $mysqli->query("SELECT * FROM hb_article");
$List_Num = mysqli_num_rows($List_Query);
if($List_Num > 0){
	while ($row = mysqli_fetch_array($List_Query)) {
		echo '<tr>
<td>'.$row['id'].'</td>
<td>'.$row['title'].'</td>
<td>'.explode("|",GetCategory($row['category'],1))[1].'</td>
<td>'.$row['views'].'</td>
<td>'.explode("|",GetUserInfo($row['userid']))[2].'</td>
<td>'.$row['date'].'</td>
<td><a href="./articleedit.php?id='.$row['id'].'"><button class="btn btn-info">编辑</button></a> <button onclick="delnews(\''.$row['id'].'\');"class="btn btn-danger">删除</button></td>
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
function save(){

$.post("../includes/adminAction.php", $("#setting").serialize()+"&action=savesetting",
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad"){ 
	alert("保存失败，错误信息："+ge[1]);
	}else if (ge[0]=="ok"){ 
iosOverlay({
		text: "保存成功",
		duration: 2e3,
		icon: "images/check.png"
	});
	
	}
   });
}
$(function () {
  $('[data-toggle="popover"]').popover()
})

function delnews(id){
 var returnVal = window.confirm("删除操作不可恢复，确定删除此文章？", "确认删除");
if(!returnVal) {
    
}else{ 

  $.post("../includes/adminAction.php",{id: id,action: "delarticle"},
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