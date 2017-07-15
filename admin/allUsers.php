<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/allUsers_functions.php';
require_once 'functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("allUsers.php", $_SESSION['role'], 0);


$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Users');
$smarty->assign('header_page', 'All 24CinL Users - Management');
$smarty->assign('tables', TABLES);
$smarty->assign('page', USERS_MANAGEMENT);


if (isset($_GET['error']))
    $smarty->assign("error", "*" . $_GET['error']);


// Operation
$users = get_usersTable();
$header = get_userTableHeader();

$smarty->assign('table_head', $header);
$smarty->assign('rows', $users);
$smarty->assign('operation_1', 'delete');
$smarty->assign('operation_2', 'edit');
$smarty->assign('total_pageTable', get_totalPage(count($users)));


$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}

?>
