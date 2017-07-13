<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("standard.php", $_SESSION['role'], 0);


$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Home');
$smarty->assign('header_page', 'Welcome to 24CinL Team');
$smarty->assign('page', STANDARD);


// Operation
$admins = get_admins_infos();

$smarty->assign('admins', $admins);


$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
