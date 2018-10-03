<?php
$title="站点设置";
require_once("common/header.php");

$Settings_Query = $mysqli->query("SELECT * FROM hb_config WHERE id = 0 LIMIT 1");
$Settings_Num = mysqli_num_rows($Settings_Query);
if($Settings_Num == 1){
	while ($row = mysqli_fetch_array($Settings_Query)) {
		$Settings_Title = $row['title'];
		$Settings_STitle = $row['stitle'];
		$Settings_Domain = $row['domain'];
		$Settings_Dir = $row['dirname'];
		$Settings_ICP = $row['icpbeian'];
	}
}
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">基本设置</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form id="setting">
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">站点标题:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="title" value="<?php echo $Settings_Title ?>"class="form-control" required>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">站点的标题</div>
                    </div>
              
            </div>
			<div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">站点副标题:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="stitle" value="<?php echo $Settings_STitle ?>"class="form-control" required>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">站点的副标题</div>
                    </div>
              
            </div>
			<div style="height:10px;"></div>            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">站点域名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="domain" value="<?php echo $Settings_Domain ?>"class="form-control" required>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">站点所在的域名，即网站主站域名，前面需要加http或https</div>
                    </div>
              
            </div>
			<div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">站点目录:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="dir" value="<?php echo $Settings_Dir ?>"class="form-control" required>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">站点所在的目录，即网站主站目录，前后均需加/</div>
                    </div>
              
            </div>
			<div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">ICP备案号:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="icpbeian" value="<?php echo $Settings_ICP ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">ICP备案号</div>
                    </div>
              
            </div>
            <!-- /.row -->        </form>
             <!-- /.row -->
                <div style="height:20px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
   
                    </div>
                 <div class="col-lg-5" align="left">
           <button class="btn btn-lg btn-primary" onclick="save()">保存更改</button>
                    </div>
                    <div class="col-lg-3" align="right">
        
                    </div>
              
            </div>
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


</body>
</html>
<script src="js/setting.js"></script>