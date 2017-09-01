<?php

/*	Get article by Tag	*/

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/category&tag_functions.php';


$smarty = new Blog_Item();

$tag = tag_by_name($_GET['tag']);
$page_limit = get_total_page($_GET['tag'], "tag");

// Turn back link (arrow-left)
$smarty->assign('section', "tag");
$smarty->assign('temp_section', 'tag');

// Set category information
$smarty->assign('tag', $tag);

// Set sub-Position for page navigation
$smarty->assign('subPosition', 'section=tag&name='.$_GET['tag']);
$smarty->assign('option', 'section=tag&name='.$_GET['tag']."&");

if($page_limit > 0){

	$current_page = get_current_page();
	$articles = list_by_tag($_GET['tag'], $current_page);

	$smarty->assign('articles', $articles);

	// Page set
	$smarty->assign('current_page', $current_page);
	$smarty->assign('page_limit', $page_limit);

	// Set navigation button visibility
	if($current_page == 1)
		$smarty->assign('previousPage_style', 0);
	else
		$smarty->assign('previousPage_style', 1);

	if($current_page == $page_limit)
		$smarty->assign('nextPage_style', 0);
	else
		$smarty->assign('nextPage_style', 1);

	// Navigation button name
	$smarty->assign('next', 'Next');
	$smarty->assign('back', 'Back');
}

$smarty->assign('home_page', HOME_PAGE);
$smarty->assign('list_of_articles', LIST_OF_ARTICLES);
$smarty->assign('page_navigation', PAGE_NAVIGATION);

$smarty->display(CATEGORIES_TAGS_PAGE);

?>
