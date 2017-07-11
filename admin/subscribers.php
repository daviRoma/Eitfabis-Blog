<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/subscribers_functions.php';
require_once 'functions/service_setup.php';

// Check the privilegies of the logged user before proceeding
check_service("subscribers.php", $_SESSION['role'], 0);


$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);

$smarty->assign('position', 'Subscribers');
$smarty->assign('header_page', 'Subscriber List');
$smarty->assign('tables', TABLES);
$smarty->assign('page', SUBSCRIBERS);

//Operation
$subscribers = get_subscriberList();
$head = get_subscribersTableHeader();

$smarty->assign('table_head', $head);
$smarty->assign('rows', $subscribers);
$smarty->assign('operation_1', 'delete');
$smarty->assign('operation_2', 'edit');
$smarty->assign('total_pageTable', get_totalPage(count($subscribers)));

$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}

?>
