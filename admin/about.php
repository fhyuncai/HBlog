<?php
require("../inc.php");
require("../includes/usercheck.php");
$title = "关于";
require_once("common/header.php");

$version = explode("|",file_get_contents("../includes/VERSION"));
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">关于</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div id="jian" class="jumbotron">
  <h1><span class="fa fa-cloud"></span> 关于 Hblog</h1>
  <p>程序版本：<?php echo $version['0'] ?>，版本代号：<?php echo $version[1] ?></p>
  <p>&copy; <a href="https://loili.com/" target="new">YunZhiTeam</a></p>
  <p>由于HBlog还有许多的Bug，希望各位小伙伴发现后都来反馈一下_(:зゝ∠)_</p>
</div>


        </div>
        <!-- /#page-wrapper -->


    <!-- /#wrapper -->

    <!-- jQuery -->


</body>

</html>
<script>
function check(){
	$("#jc").attr("disabled","true");
		$("#jc").html("检查中...");
$.getJSON("https://www.yuncaioo.com/api/hblog/check.php?v=<?php echo $version[1] ?>&callback=?",
   function(data){
var ge=data;
	if(ge[0]=="bad"){ 
	alert("检查失败，错误信息："+ge[1]);
		$("#jc").removeAttr("disabled"); 
		$("#jc").html("立即检查新版本");
	}else if (ge[0]=="no"){ 
	iosOverlay({
		text: "未检测到新版本",
		duration: 2e3,
		icon: "./images/check.png"
		
	});
		$("#jc").removeAttr("disabled"); 
		$("#jc").html("立即检查新版本");
	}else if(ge[0]=="ok"){ 
	$("#newversion").html(ge[1]);
		$("#jianjie").html(ge[4]);
		$("#jian").hide();
		$("#xin").show();
		$("#gx").click(function() {
				$("#xin").hide();
					$("#gxing").show();
		$.post("../includes/update.php", {
			v1:ge[1],
			v2:ge[2],
			v3:ge[3],
			url:ge[5],
			
			
			},
   function(dd){
	   
	   	var di=dd.split(".");
		if(di[0]=="bad"){
			$("#gxing").hide();
				$("#shibai").show();
			$("#shibai_text").html(di[1]);
			
			}else if(di[0]=="ok"){
				
					$("#gxing").hide();
				$("#chenggong").show();
				}
	   
	   
	   
	   
   });
		
			} );
		
	}
   });
}

</script>
