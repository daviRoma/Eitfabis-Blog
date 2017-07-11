<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/blog-setting_functions.php';
require_once 'functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("blog.php", $_SESSION['role'], 0);

$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Blog');
$smarty->assign('header_page', '24CinL Blog - Settings');
$smarty->assign('tables', TABLES);
$smarty->assign('page', BLOG_SETTING);


// Operation
$infos = get_BlogTable();
$header = get_blogTableHeader();

$smarty->assign('table_head', $header);
$smarty->assign('rows', $infos);
$smarty->assign('operation_1', 'delete');
$smarty->assign('operation_2', 'edit');
$smarty->assign('operation_3', 'load');
$smarty->assign('total_pageTable', get_totalPage(count($infos)));


$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}

?>
