<?php
$newver=$_POST['newver'];
$url=$_POST['url'];

require("../inc.php");
require("usercheck.php");
$destination_folder = 'data/';
$newfname = $destination_folder . basename($url);         
$file = fopen ($url, "rb");         
if ($file) {         
$newf = fopen ($newfname, "wb");         
if ($newf)         
while(!feof($file)) {         
fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );         
}         
}         
if ($file) {         
fclose($file);         
}         
if ($newf) {         
fclose($newf);         
}         


$jieya=get_zip_originalsize("data/".basename($url),'../');
if($jieya=="ok"){ 

echo "ok.更新完成";
}else{ 

echo "bad.无法解压更新文件";
}
?>