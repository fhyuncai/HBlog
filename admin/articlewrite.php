<?php
$title="撰写文章";
require_once("common/header.php");

?>
<body>
<script type="text/javascript" charset="utf-8" src="editor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="editor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="editor/lang/zh-cn/zh-cn.js"></script>
      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">撰写文章</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="table-responsive">
             <br>
<div class="row">
     <form id="article">
                 <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">标题:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="title" class="form-control">
                    </div>
              
            </div>
			   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">分类:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <select name="category" class="form-control">
<?php
$getall = GetAllCategory();
$x = 1;
while(explode("|",$getall)[0] >= $x){
	$catelist = explode("~~",explode("|",$getall)[$x]);
	echo '<option value ="'.$catelist[0].'">'.$catelist[1].'</option>'."\r\n";
	$x++;
}
?>
                 </select> 
                    </div>
              
            </div>
              <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">内容</label>
                    </div>
                 <div class="col-lg-5" align="left">
                 <script id="editor" name="content" type="text/plain" style="width:auto;height:400px;"></script>
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
           <a class="btn btn-lg btn-primary" onClick="save();">发布</a>
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
var ue = UE.getEditor('editor');
function save(){

$.post("../includes/adminAction.php", $("#article").serialize()+"&action=articlewrite",
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad"){ 
	alert("发布失败，错误信息："+ge[1]);
	}else if (ge[0]=="ok"){ 
iosOverlay({
		text: "发布成功",
		duration: 2e3,
		icon: "images/check.png"
	});
	window.location.href="./articlelist.php";
	}
   });
}
</script>