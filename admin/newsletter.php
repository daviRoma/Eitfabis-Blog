<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/newsletter_functions.php';
require_once 'functions/service_setup.php';

// Check the privilegies of the logged user before proceeding
check_service("newsletter.php", $_SESSION['role'], 0);

$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Newsletter');
$smarty->assign('header_page', 'Write newsletter');
$smarty->assign('page', NEWSLETTER);
$smarty->assign('tables', TABLES);


//Operation
$newsletters = get_newsletterList();
$head = get_newsletterTableHeader();

$smarty->assign('table_head', $head);
$smarty->assign('rows', $newsletters);
$smarty->assign('operation_1', 'delete');
$smarty->assign('total_pageTable', get_totalPage(count($newsletters)));

$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}

?>
