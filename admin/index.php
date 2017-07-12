<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/articles_functions.php';
require_once 'functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("index.php", $_SESSION['role'], 0);


$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Home');
$smarty->assign('header_page', 'Write new article');
$smarty->assign('page', DASHBOARD);

$section = "none";

if(isset($_GET['error']))
    $smarty->assign("error", $_GET['error']);
    
// Operation
$categories = get_categoryList();

$smarty->assign('categories', $categories);
$smarty->assign('is_draft', 0);

if(isset($_GET['error']))
    $smarty->assign("error", "*" . $_GET['error']);


$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
