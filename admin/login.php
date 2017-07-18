<?php

session_start();

require 'configs/smarty_setup.php';
require 'functions/utility_functions.php';

redirect("index.php", isset($_SESSION['username']));

$login = new Admin_Item();

$login->assign('page_name', "Login");

if(isset($_SESSION['error'])){
	$login->assign('error', "*Error!");
	$login->assign('type_error', $_SESSION['error']);
	session_destroy();
}

$login->display('login.tpl');

?>
