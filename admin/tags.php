<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/tags_functions.php';
require_once 'functions/categories_functions.php';
require_once 'functions/service_setup.php';

// Check the privilegies of the logged user before proceeding
check_service("tags.php", $_SESSION['role'], 0);



$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Tags');
$smarty->assign('header_page', 'Tags Management');
$smarty->assign('tables', TABLES);
$smarty->assign('page', TAGS);


if(isset($_GET['error']))
    $smarty->assign("error", "*" . $_GET['error']);

//Operation
$tags = get_tagList();
$categories = get_categoryList();
$head = get_tagTableHeader();

$smarty->assign('categories', $categories);
$smarty->assign('table_head', $head);
$smarty->assign('rows', $tags);
$smarty->assign('operation_1', 'delete');
$smarty->assign('operation_2', 'edit');
$smarty->assign('total_pageTable', get_totalPage(count($tags)));


$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
