<?php

require_once 'configs/blog_configs.php';
require_once 'configs/smarty_setup.php';
require_once 'functions/blog_functions.php';
require_once 'functions/users_functions.php';


$smarty = new Blog_Item();

$blog = get_blog_info('About Us');

// Navbar update
$smarty->assign('reload_position', get_current_url());
$smarty->assign('position', $blog['page']);

// Page update
$smarty->assign('background', $blog['background']);
$smarty->assign('page_title', $blog['title']);
$smarty->assign('page_subtitle', $blog['subtitle']);
$smarty->assign('page', ABOUT_US_PAGE);


$users = retrieve_user_info();

if(is_string($users))
	redirect("error_page.php?error=$users", true);


$list = assign_users($users);


$smarty->assign('users', $list);
$smarty->assign('list_of_users', LIST_OF_USERS);

$smarty->display(STARTER);

?>
