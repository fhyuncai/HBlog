<?php
require_once("../init.php");
require_once("usercheck.php");

$action = $_POST['action'];

switch ($action) {
	case 'savesetting':
		$title=$_POST['title'];
		$stitle=$_POST['stitle'];
		$domain=$_POST['domain'];
		$dir=$_POST['dir'];
		$icpbeian=$_POST['icpbeian'];
		if ($mysqli->query("UPDATE hb_config SET title = '{$title}',stitle = '{$stitle}',domain = '{$domain}',dirname = '{$dir}',icpbeian = '{$icpbeian}' WHERE id = 0")){
		  echo "ok|ok";
		}else{
		  echo "bad|" . "无法修改数据表";
		}
		break;
	case 'articleedit':
		$e_id=$_POST['id'];
		$e_title=$_POST['title'];
		$e_category=$_POST['category'];
		$e_content=$_POST['content'];
		$e_date=date("Y-m-d H:i:s");
		if ($e_title == '' || $e_content == ''){
			echo "bad|请填写所有文本框";
		}else{
			if ($mysqli->query("UPDATE hb_article SET category = '{$e_category}',date = '{$e_date}',title = '{$e_title}',content = '{$e_content}' WHERE id = {$e_id}")){
				echo "ok|成功";
			}else{
				echo "bad|" ."无法修改数据表";
			}
		}
		break;
	case 'articlewrite':
		$n_title=$_POST['title'];
		$n_category=$_POST['category'];
		$n_content=$_POST['content'];
		$n_date=date("Y-m-d H:i:s");
		if ($n_title == '' || $n_content == ''){
			echo "bad|请填写所有文本框";
		}else{
			if ($mysqli->query("INSERT INTO `hb_article` (`id`, `category`, `date`, `title`, `content`, `userid`, `views`) VALUES(NULL, '{$n_category}', '{$n_date}', '{$n_title}', '{$n_content}', '{$_SESSION['id']}', 0)")){
				echo "ok|成功";
			}else{
				echo "bad|" ."无法修改数据表";
			}
		}
		break;
	case 'savenews':
		$policyname=$_POST['policyname'];
		$policytype=$_POST['policytype'];
		$kjm=$_POST['kjm'];
		if($policytype == "qiniu"){
			$p_server = $_POST["p_server"];
		}else{
			$p_server = $_POST['p_server_method'] == "http://" ? "http://".$_POST['p_server']."/" : "https://".$_POST['p_server']."/";
		}
		$p_dir=$_POST['p_dir'];
		$namerule=$_POST['namerule'];
		$zzurl=$_POST['zzurl'];
		$ak=$_POST['ak'];
		$sk=$_POST['sk'];
		$kjurl = $_POST['kjurl_method'] == "http://" ? "http://".$_POST['kjurl']."/" : "https://".$_POST['kjurl']."/";
		$hz= $_POST['hz'];
		$dx= $_POST['dx']*1048576;
		$fp= $_POST['fp'];
		$lx= $_POST['lx'];
		$mm= $_POST['mm'];
		$op_name = $_POST['op_name'];
		$op_pwd = $_POST['op_pwd'];
		$ju = "INSERT INTO `sd_policy` ( `p_name`, `p_type`, `p_server`, `p_bucketname`, `p_url`, `p_ak`, `p_sk`, `p_filetype`, `p_mimetype`, `p_size`, `p_autoname`, `p_dir`, `p_namerule`,`p_op_name`, `p_op_pwd`) VALUES ( '$policyname', '$policytype', '$p_server', '$kjm', '$kjurl', '$ak', '$sk', '$hz', '$lx', '$dx', '$mm', '$p_dir', '$namerule', '$op_name', '$op_pwd');";
		
		if (mysqli_query($con,$ju)){
		  echo "ok|ok";
		  }else{
		  echo "bad|" ."无法修改数据表";
		  }
		break;
	case 'deluser':
		$u_id = $_POST['id'];
		$mysqli->query("DELETE FROM hb_user WHERE id = {$u_id}");
 		echo "ok.删除成功";
		break;
	case 'delnews':
		$dn_id = $_POST['id'];
		$mysqli->query("DELETE FROM hb_article WHERE id = {$dn_id}");
 		echo "ok.删除成功";
		break;
	case 'adduser':
		$userName = $_POST['username'];
		$passWord = $_POST['pwd'];
		$group = $_POST['ug'];
		$Name = $_POST['name'];
		$Sex = $_POST['sex'];
		$userGrade = $_POST['grade'];
		$userClass = $_POST['class'];
		$AssnID = $_POST['assnid'];
		$userSeesion = $_POST['seesion'];
		$userName = str_replace(" ", "", $userName);
	    $passWord = str_replace(" ", "", $passWord);
		if ((mb_strlen($userName,'UTF8')>22) || (mb_strlen($userName,'UTF8')<4) || (mb_strlen($passWord,'UTF8')>16) || (mb_strlen($passWord,'UTF8')<4)){
			echo("bad.用户名或密码不符合规范");
			exit();		
		}
		
		$AddUser_Query = $mysqli->query("SELECT id FROM hb_user WHERE user = '{$userName}'");
		$AddUser_Num = mysqli_num_rows($AddUser_Query);
	 	if($AddUser_Num != 0){
	 		$result['code']="bad";
			$result['message']=urlencode("此用户名已被注册！");
			echo "bad.此用户名已被注册！";			
	 	}else{
		 	$passWord=md5($passWord."hblog");
		 	$AddUser_Query = $mysqli->query("INSERT INTO `hb_user` (`id`, `user`, `pass`, `name`, `grade`, `class`, `sex`, `level`, `assnid`, `session`) VALUES(NULL, '{$userName}', '{$passWord}', '{$Name}', {$userGrade}, {$userClass}, {$Sex}, {$group}, '{$AssnID}', '{$userSeesion}');");
		 	echo "ok.添加成功";
	    }
 		break;
 	case 'edituser':
 		$u_id = $_POST['u_id'];
		$u_user=$_POST['u_user'];
		$u_name=$_POST['u_name'];
		$u_sex=$_POST['u_sex'];
		$u_group=$_POST['u_group'];
		$u_mail=$_POST['u_mail'];
		$u_pass=$_POST['u_pass'];
 		$userName = str_replace(" ", "", $u_user);
	    $passWord = str_replace(" ", "", $u_pass);
	    if ((mb_strlen($userName,'UTF8')>22) || (mb_strlen($userName,'UTF8')<4)){
		echo("bad|用户名不符合规范");
		exit();		
			}
		if(empty($passWord)){
			$sql = "UPDATE hb_user SET user = '{$userName}',name = '{$u_name}',`group` = '{$u_group}',sex = '{$u_sex}',mail = '{$u_mail}' WHERE id = {$u_id}";
		}else{
			$passWord=md5($passWord."hblog");
			$sql = "UPDATE hb_user SET user = '{$userName}',name = '{$u_name}',`group` = '{$u_group}',sex = '{$u_sex}',mail = '{$u_mail}',pass = '{$passWord}' WHERE id = {$u_id}";
		}

		if ($mysqli->query($sql)){
		  echo "ok|ok";
		  }else{
		  echo "bad|" ."无法修改数据表";
		  }
 		break;
 	case 'addgroup':
 		$timeNow = date('Y-m-d H:i:s');
 		$groupName = $_POST['gname'];
 		$groupPolicy = $_POST['gpolicy'];
 		$sql="INSERT INTO  `sd_usergroup` (`gname` ,`addtime` ,`policyid`)VALUES ('$groupName', '$timeNow', '$groupPolicy');";
 		if (mysqli_query($con,$sql)){
		  echo "ok|ok";
		  }else{
		  echo "bad|" ."无法修改数据表";
		  }
		break;
	case 'delgroup':
		$groupId = $_POST['gid'];
		if($groupId == "1"||$groupId == "2"){
			echo "bad.系统默认用户组无法删除";
			exit();
		}
		$check = "SELECT * FROM sd_users where `group` = '$groupId'";
		$cha_result3=mysqli_query($con,$check);
		$zuori3=mysqli_num_rows($cha_result3);
		if ($zuori3 >0){
			echo "bad.用户组下还有用户，请先删除这些用户";
			exit();
		}
		$delAction = "delete from sd_usergroup where id = '$groupId'";
		if (mysqli_query($con,$delAction)){
		  echo 
		  "ok.删除成功";
		  }else{
		  echo "bad." ."无法修改数据表";
		  }
		break;
	case 'editgroup':
		$groupId = $_POST['egid'];
		$groupName = $_POST['egname'];
		$groupPolicy = $_POST['epolicy'];
		$sql = "UPDATE `sd_usergroup` SET `gname` = '$groupName',`policyid` = '$groupPolicy' WHERE `id` = '$groupId'";
		if (mysqli_query($con,$sql)){
		  echo "ok|成功";
		  }else{
		  echo "bad|" ."无法修改数据表";
		  }
		break;
	case 'cleantemp':
		delFileUnderDir("../content/cache/templates_c");
		//delFileUnderDir("../content/templates_c");
		echo "ok|ok";
		break;
	case 'cleansql':
		$ju = "OPTIMIZE TABLE `sd_file`, `sd_policy`, `sd_setting`, `sd_ss`, `sd_sskey`, `sd_user`, `sd_usergroup`, `sd_users`";
		if(mysqli_query($con,$ju)){
			echo "ok|ok";
		}else{
			echo "bad|无法执行";
		}
		break;
	default:
		# code...
		break;
}
?>
