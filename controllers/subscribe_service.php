<?php

require_once '../configs/blog_configs.php';
require_once BLOG_ROOT . '/functions/db_functions.php';
require_once BLOG_ROOT . '/functions/utility_functions.php';

$error = '';

if(isset($_POST['subscribe'])) {

    if(empty($_POST['email'])) {
		$error = 'This field can not be empty';
		redirect("/index.php?error=$error", true);
    }

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error = 'The email format is invalid';
		redirect("/index.php?error=$error", true);
    }

	$email = mysqli_real_escape_string($conn, $_POST['email']);

	$query = selectRecord('TAB_SUBSCRIBERS', "email='$email'");

	if(count($query) > 0){
		$error = 'You are already subscribed!';
		redirect("/index.php?error=$error", true);
	}

	// insert new record
	$data = array();
	$data['email'] = $email;
	$query = insertRecord('TAB_SUBSCRIBERS', $data);

	redirect("/index.php", true);

} else {
	$error = 'Offline service, please try later.';
	redirect("/index.php?error=$error");
}

?>
