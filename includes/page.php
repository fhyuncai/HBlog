<?php
if(!isset($page) || $page == ""){
	$Action = "Index";
}elseif(is_numeric($page) && GetArticle($page) != "Error"){
	$Action = "Article";
}elseif(GetCategory($page,2) != "Error"){
	$Action = "Category";
}else{
	$Action = "Error";
}

$smarty->template_dir = HBLOG_THEME;

switch($Action){
	case "Index":
		$smarty->assign("HBLOG_THEME", HBLOG_THEME);
		$smarty->assign("Title", $result[1]);
		$smarty->assign("STitle", $result[2]);
		$smarty->assign("Domain", $result[3]);
		$smarty->assign("Dir", $result[4]);
		$smarty->assign("Theme", $result[5]);
		$smarty->assign("ICP", $result[6]);
		
		require_once(HBLOG_THEME."/function.php");
		
		$smarty->display("index.tpl");
		break;
	case "Article":
		$Article = explode("|",GetArticle($page));
		
		$smarty->assign("HBLOG_THEME", HBLOG_THEME);
		$smarty->assign("Title", $result[1]);
		$smarty->assign("STitle", $result[2]);
		$smarty->assign("Domain", $result[3]);
		$smarty->assign("Dir", $result[4]);
		$smarty->assign("Theme", $result[5]);
		$smarty->assign("ICP", $result[6]);
		
		$smarty->assign("ACategory", $Article[1]);
		$smarty->assign("ATime", $Article[2]);
		$smarty->assign("ATitle", $Article[4]);
		$smarty->assign("AContent", $Article[5]);
		
		require_once(HBLOG_THEME."/function.php");
		
		$smarty->display("article.tpl");
		break;
	case "Category":
		$Category = explode("|",GetCategory($page,2));
		
		$smarty->assign("HBLOG_THEME", HBLOG_THEME);
		$smarty->assign("Title", $result[1]);
		$smarty->assign("STitle", $result[2]);
		$smarty->assign("Domain", $result[3]);
		$smarty->assign("Dir", $result[4]);
		$smarty->assign("Theme", $result[5]);
		$smarty->assign("ICP", $result[6]);
		
		$smarty->assign("CName", $Category[1]);
		$smarty->assign("CAlias", $Category[2]);
		
		require_once(HBLOG_THEME."/function.php");
		
		$smarty->display("category.tpl");
		break;
	default:
		$smarty->display("404.tpl");
		break;
}