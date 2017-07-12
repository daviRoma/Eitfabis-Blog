<?php

require_once '../configs/blog_configs.php';
require_once BLOG_ROOT . '/functions/db_functions.php';
require_once BLOG_ROOT . '/functions/utility_functions.php';

$error = '';

if(isset($_POST['send'])) {
	$required = array('name', 'email', 'message');

	if(emptycheck($required)) {
    	$error = 'All fields are mandatory.';
        redirect("/contact_us.php?error={$error}", true);
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error = 'The email format is invalid';
	 	redirect("/contact_us.php?error={$error}", true);
     }

	 $name = mysqli_real_escape_string($conn, $_POST['name']);
	 $email = mysqli_real_escape_string($conn, $_POST['email']);
	 $message = mysqli_real_escape_string($conn, $_POST['message']);

     // insert new record in report
	 $data = array();
	 $data['name'] = $name;
	 $data['email'] = $email;
	 $data['message'] = $message;
	 $data['date'] = date('Y-m-d  H:i:s');
	 $data['flag'] = false;

	 $query = insertRecord('reports', $data);

	 redirect("/contact_us.php?success=true", true);

} else {
	$error = 'Offline service, please try later.';
	redirect("/index.php", true);
}

?>
