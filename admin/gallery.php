<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/gallery_functions.php';
require_once 'functions/service_setup.php';

// Check the privilegies of the logged user before proceeding
check_service("gallery.php", $_SESSION['role'], 0);

$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);

$smarty->assign('position', 'Gallery');
$smarty->assign('header_page', 'Gallery Management');
$smarty->assign('tables', TABLES);
$smarty->assign('page', GALLERY);


//Operation
$uploadList = get_uploadList();
$head = get_uploadTableHeader();

$smarty->assign('table_head', $head);
$smarty->assign('rows', $uploadList);
$smarty->assign('operation_1', 'delete');
$smarty->assign('operation_2', 'edit');
$smarty->assign('total_pageTable', get_totalPage(count($uploadList)));

$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
