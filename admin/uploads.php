<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/service_setup.php';

// Check the privilegies of the logged user before proceeding
check_service("uploads.php", $_SESSION['role'], 0);


$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Upload');
$smarty->assign('header_page', 'Multiple file uploader');
$smarty->assign('page', UPLOADS);



$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}

?>
