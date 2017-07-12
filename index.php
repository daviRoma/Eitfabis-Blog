<?php

require_once 'configs/blog_configs.php';
require_once 'configs/smarty_setup.php';
require_once 'functions/blog_functions.php';
require_once 'functions/articles_functions.php';


$smarty = new Blog_Item();

$blog = get_blog_info('Home');

// Navbar update
$smarty->assign('reload_position', get_current_url());
$smarty->assign('position', $blog['page']);

// Page update
$smarty->assign('background', $blog['background']);
$smarty->assign('page_title', $blog['title']);
$smarty->assign('page_subtitle', $blog['subtitle']);
$smarty->assign('page', HOME_PAGE);

// Article list set
$current_page = get_current_page();
$page_limit = get_page_limit(null);

$articles = retrieve_recent($current_page, $page_limit);

// Error checking
if(is_string($articles))
	redirect("index.php?error=$articles", true);

if(isset($_GET['error']))
	$smarty->assign("error", $_GET['error']);


$list = assign_articles($articles);


// set navigation button visibility
if($current_page == 1)
	$smarty->assign('previousPage_style', 'style="display:none;"');
else
	$smarty->assign('previousPage_style', 'style="display:block;"');

if($current_page == $page_limit)
	$smarty->assign('nextPage_style', 'style="display:none;"');
else
	$smarty->assign('nextPage_style', 'style="display:block;"');


// Page set
$smarty->assign('page_set', $current_page);
$smarty->assign('current_page', $current_page);
$smarty->assign('page_limit', $page_limit);

// Navigation button name
$smarty->assign('next', 'Older Posts');
$smarty->assign('back', 'Recent Posts');

// assign articles list
$smarty->assign('articles', $list);

// Home-page display
$smarty->assign('list_of_articles', LIST_OF_ARTICLES);
$smarty->assign('page_navigation', PAGE_NAVIGATION);

$smarty->display(STARTER);

?>
