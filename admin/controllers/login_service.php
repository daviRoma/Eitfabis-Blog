<?php

session_start();

require_once '../configs/admin_configs.php';
require_once _ROOT . '/admin/functions/service_setup.php';

$_SESSION['error'] = '';		//variable to store error

if(isset($_SESSION['username']))
	go_to_start($_SESSION['role']);


if(isset($_POST['login']) ){
	$required = array('username', 'password');

	if(emptycheck($required)) {
		$_SESSION['error'] = 'Required fields: ' . emptycheck($required);
    	redirect("../login.php");
    }

	//user check
	$username = stripslashes($_POST['username']);
	$password = stripslashes(md5($_POST['password']));


	$query = array();
	$query = selectRecord(TAB_USERS, "username = '$username' AND password = '$password'");
	$id = $query['id'];
	$group = selectRecord(TAB_USR_ROLE, "userId = '$id'");


	if(count($query) > 0) {
		$_SESSION['userId'] = $id;
		$_SESSION['username'] = $username;
		$_SESSION['role'] = $group['groupId'];
		//Get user image
		if($_SESSION['role'] == 1){
			$image = selectRecord(TAB_PERSONALINFO, "user = '$id'");
			$_SESSION['userPicture'] = $image['img_address'];
		}else{
			$_SESSION['userPicture'] = "upload/user/user-default.png";
		}
		go_to_start($_SESSION['role']);
	}else{
		$_SESSION['error'] = "Invalid username or password";
		redirect("../login.php");
	}
}

redirect("../login.php", !isset($_SESSION['username']));

?>
