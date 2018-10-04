<?php
function GetConfig(){
	require("mysqli.php");
	$Mysql_Query = $mysqli->query("SELECT * FROM hb_config WHERE id = 0 LIMIT 1");
	$Mysql_Num = mysqli_num_rows($Mysql_Query);
	if($Mysql_Num == 1){
		while ($row = mysqli_fetch_array($Mysql_Query)) {
			$Info1 = $row['title'];
			$Info2 = $row['stitle'];
			$Info3 = $row['domain'];
			$Info4 = $row['dirname'];
			$Info5 = $row['theme'];
			$Info6 = $row['icpbeian'];
		}
		return '0|'.$Info1.'|'.$Info2.'|'.$Info3.'|'.$Info4.'|'.$Info5.'|'.$Info6;
	}else{
		return "Error";
	}
	$mysqli->close();
}

function Views($id){
	require("mysqli.php");
	$Mysql_Query = $mysqli->query("SELECT views FROM hb_article WHERE id = {$id} LIMIT 1");
	$Mysql_Num = mysqli_num_rows($Mysql_Query);
	if($Mysql_Num == 1){
		while ($row = mysqli_fetch_array($Mysql_Query)) {
			$Views = $row['views'];
		}
		$NewViews = $Views+1;
		$Update_Query = $mysqli->query("UPDATE hb_article SET views='{$NewViews}' WHERE id = {$id}");
		return $Views;
	}else{
		return "Error";
	}
	$mysqli->close();
}

function GetUserInfo($userid){
	require("mysqli.php");
	$Mysql_Query = $mysqli->query("SELECT * FROM hb_user WHERE id = {$userid} LIMIT 1");
	$Mysql_Num = mysqli_num_rows($Mysql_Query);
	if($Mysql_Num == 1){
		while ($row = mysqli_fetch_array($Mysql_Query)) {
			$Info = $row['id'];
			$Info1 = $row['user'];
			$Info2 = $row['name'];
			$Info3 = $row['group'];
			$Info4 = $row['sex'];
			$Info5 = $row['mail'];
		}
		return $Info.'|'.$Info1.'|'.$Info2.'|'.$Info3.'|'.$Info4.'|'.$Info5;
	}else{
		return "Error";
	}
	$mysqli->close();
}

function GetAllUserGroup(){
	require("mysqli.php");
	$Mysql_Query = $mysqli->query("SELECT * FROM hb_group");
	$Mysql_Num = mysqli_num_rows($Mysql_Query);
	if($Mysql_Num >= 1){
		while ($row = mysqli_fetch_array($Mysql_Query)) {
			$Group = $Group.'|'.$row['id'].'~~'.$row['name'];
		}
		return $Mysql_Num.$Group;
	}else{
		return "Error";
	}
	$mysqli->close();
}

function GetAllCategory(){
	require("mysqli.php");
	$Mysql_Query = $mysqli->query("SELECT * FROM hb_category");
	$Mysql_Num = mysqli_num_rows($Mysql_Query);
	if($Mysql_Num >= 1){
		while ($row = mysqli_fetch_array($Mysql_Query)) {
			$Cate = $Cate.'|'.$row['id'].'~~'.$row['name'];
		}
		return $Mysql_Num.$Cate;
	}else{
		return "Error";
	}
	$mysqli->close();
}

function GetCategory($id,$action){
	require("mysqli.php");
	if($action == 1){
		$sql = "SELECT * FROM hb_category WHERE id = {$id} LIMIT 1";
	}elseif($action == 2){
		$sql = "SELECT * FROM hb_category WHERE alias = '{$id}' LIMIT 1";
	}else{
		$sql = "SELECT * FROM hb_category WHERE name = '{$id}' LIMIT 1";
	}
	$Mysql_Query = $mysqli->query($sql);
	$Mysql_Num = mysqli_num_rows($Mysql_Query);
	if($Mysql_Num == 1){
		while ($row = mysqli_fetch_array($Mysql_Query)) {
			$Info = $row['id'];
			$Info1 = $row['name'];
			$Info2 = $row['alias'];
		}
		return $Info.'|'.$Info1.'|'.$Info2;
	}else{
		return "Error";
	}
	$mysqli->close();
}

function GetArticleList($cateid){
	require("mysqli.php");
	if($cateid === 0){
		$sql = "SELECT * FROM hb_article";
	}else{
		$sql = "SELECT * FROM hb_article WHERE category = '".GetCategory($cateid,2)[0]."'";
	}
	$Mysql_Query = $mysqli->query($sql);
	$Mysql_Num = mysqli_num_rows($Mysql_Query);
	if($Mysql_Num >= 1){
		while ($row = mysqli_fetch_array($Mysql_Query)) {
			$Cate = $Cate.'|'.$row['id'].'~~'.$row['title'].'~~'.$row['content'].'~~'.$row['category'].'~~'.$row['date'].'~~'.$row['userid'];
		}
		return $Mysql_Num.$Cate;
	}else{
		return "Error";
	}
	$mysqli->close();
}

function GetArticle($articleid){
	require("mysqli.php");
	$Mysql_Query = $mysqli->query("SELECT * FROM hb_article WHERE id = '{$articleid}' LIMIT 1");
	$Mysql_Num = mysqli_num_rows($Mysql_Query);
	if($Mysql_Num == 1){
		while ($row = mysqli_fetch_array($Mysql_Query)) {
			$Info = $row['id'];
			$Info1 = $row['category'];
			$Info2 = $row['date'];
			$Info3 = $row['userid'];
			$Info4 = $row['title'];
			$Info5 = $row['content'];
		}
		return $Info.'|'.$Info1.'|'.$Info2.'|'.$Info3.'|'.$Info4.'|'.$Info5;
	}else{
		return "Error";
	}
	$mysqli->close();
}

/*function user_check($uid,$shell){
    $sql="select * from sd_users where `uid` = '$uid'";
    $query=mysqli_query($con,$sql);
    $us=is_array(@$row=mysqli_fetch_assoc($query));

    $shell=$us ? $shell==md5($row[username].$row[pwd].'sdshare'):FALSE;
    if($shell){
     return $row;
     $isVisitor = "false";
    }else{
      return "bad";
      $isVisitor = "true";
    }
}*/

/** 后台专用函数 **/
function user_shell($uid,$shell){
	require("mysqli.php");
	$query = @$mysqli->query("select * from hb_user where id = '{$uid}' limit 1");
	while ($row = mysqli_fetch_array($query)) {
		$username = $row['user'];
		$password = $row['pass'];
	}

	$usershell = md5($username.$password.'hblog');
	if($shell == $usershell){
		return $row;
	}else{
		return 'bad';
	}
}

function inject_check($Sql_Str) {
	$check=preg_match('/select|insert|update|delete|\'|\\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i',$Sql_Str);
	if ($check) {
		exit;
	}else{
		return "ok";
	}
}

function delFileUnderDir($dirName){  
	if($handle = opendir("$dirName")){
		while(false !== ($item = readdir($handle))){
			if($item != "." && $item != ".."){
				if(is_dir("$dirName/$item")){
					delFileUnderDir("$dirName/$item");
				}else{
					if(unlink("$dirName/$item")){
						delFileUnderDir($dirName);
						return true;
					}else{
						return false;
					}
				}
			}
		}
		closedir($handle);
	}else{
		return false;
	}
}

function get_zip_originalsize($filename, $path) {
	//By Aaron
	//先判断待解压的文件是否存在
	if(!file_exists($filename)){
		die("bad.更新文件不存在或者无权写入");
	}
	$starttime = explode(' ',microtime()); //解压开始的时间

	//打开压缩包
	$resource = zip_open($filename);
	$i = 1;
	//遍历读取压缩包里面的一个个文件
	while ($dir_resource = zip_read($resource)) {
		//如果能打开则继续
		if (zip_entry_open($resource,$dir_resource)) {
			//获取当前项目的名称,即压缩包里面当前对应的文件名
			$file_name = $path.zip_entry_name($dir_resource);
			//以最后一个“/”分割,再用字符串截取出路径部分
			$file_path = substr($file_name,0,strrpos($file_name, "/"));
			//如果路径不存在，则创建一个目录，true表示可以创建多级目录
			if(!is_dir($file_path)){
				mkdir($file_path,0777,true);
			}
			//如果不是目录，则写入文件
			if(!is_dir($file_name)){
				//读取这个文件
				$file_size = zip_entry_filesize($dir_resource);
				//最大读取6M，如果文件过大，跳过解压，继续下一个
				$file_content = zip_entry_read($dir_resource,$file_size);
				file_put_contents($file_name,$file_content);
			}
			//关闭当前
			zip_entry_close($dir_resource);
		}
	}
	//关闭压缩包
	zip_close($resource);
	$endtime = explode(' ',microtime()); //解压结束的时间
	$thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
	$thistime = round($thistime,3); //保留3为小数
	return "ok";
}