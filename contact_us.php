<?php

require_once 'configs/blog_configs.php';
require_once 'configs/smarty_setup.php';
require_once 'functions/blog_functions.php';


$smarty = new Blog_Item();

$blog = get_blog_info('Contact');

// Navbar update
$smarty->assign('reload_position', get_current_url());
$smarty->assign('position', $blog['title']);

// Page update
$smarty->assign('background', $blog['background']);
$smarty->assign('page_title', $blog['title']);
$smarty->assign('page_subtitle', $blog['subtitle']);
$smarty->assign('page', CONTACT_PAGE);


if(isset($_GET['error']) || isset($_GET['success'])){
	if(isset($_GET['error']))
		$smarty->assign('error_message', $_GET['error']);

	if(isset($_GET['success']))
		$smarty->assign('success_message', 'Message sent correctly, we will try to answer as soon as possible.');

	$smarty->assign('notice_message', NOTICE_MESSAGE);
}

$smarty->display(STARTER);

?>
