<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/service_setup.php';
require_once 'functions/groups_and_services_functions.php';


// Check the privilegies of the logged user before proceeding
check_service("group_service.php", $_SESSION['role'], 0);



$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Groups and Services');
$smarty->assign('header_page', 'Manage services and groups');
$smarty->assign('tables', TABLES);
$smarty->assign('page', GR_SERV_MANAGEMENT);


if(isset($_GET['error']))
    $smarty->assign("error", "* " . $_GET['error']);

//Operation
$group_list = get_groups();
$service_list = get_servicesList(null);
$service_filter_list = get_servicesList("page = 1");

$smarty->assign("groups", $group_list);
$smarty->assign("services", $service_list);
$smarty->assign("filter_services", $service_filter_list);


$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
