<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/reports_functions.php';
require_once 'functions/service_setup.php';

// Check the privilegies of the logged user before proceeding
check_service("reports.php", $_SESSION['role'], 0);


$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Reports');
$smarty->assign('header_page', 'Blog visitors message');
$smarty->assign('page', REPORTS);
$smarty->assign('report_content', INBOX);


//Operation
$list = retrieve_all_reports();
$first_report = retrieve_firstReport();

$smarty->assign('reports', $list);
$smarty->assign('foreground_report', $first_report);

$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
