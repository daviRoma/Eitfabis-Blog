<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/profile_functions.php';
require_once 'functions/service_setup.php';

// Check the privilegies of the logged user before proceeding
check_service("profile.php", $_SESSION['role'], 0);


$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Setting');
$smarty->assign('header_page', '');
$smarty->assign('page', PROFILE);

if(isset($_GET['error']))
    $smarty->assign("error", $error);


// Operation
$user_info = get_userProfile($_SESSION['userId']);
$user_articles = get_userArticles($_SESSION['username']);



$smarty->assign("user", $user_info);
$smarty->assign("articles", $user_articles);
$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
