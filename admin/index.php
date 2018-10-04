<?php
$title="首页";
require_once("common/header.php");

$version = explode("|",file_get_contents("../includes/VERSION"));
?>
<body>

      <script src="js/raphael-min.js"></script>
    <script src="js/morris.min.js"></script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">首页</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            
                            <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bullhorn fa-fw"></i> 官方公告
                          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="news">
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
              
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


</body>
</html>
<script>
$(document).ready(function() {
	$.getJSON("https://www.yuncaioo.com/api/hblog/news.php?v=<?=$version[1]?>", function(data){
		$("#news").html(data.news);
	})
})
</script>