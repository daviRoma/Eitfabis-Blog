<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/category&tag_functions.php';


$smarty = new Blog_Item();

$category = category_by_name($_GET['category']);
$page_limit = get_total_page($_GET['category'], "category");

// Turn back link (arrow-left)
$smarty->assign('section', "category");
$smarty->assign('temp_section', 'category');

// Set category information
$smarty->assign('category', $category);

// Set sub-Position for page navigation
$smarty->assign('subPosition', 'section=category&name='.$_GET['category']);
$smarty->assign('option', 'section=category&name='.$_GET['category']."&");


if($page_limit > 0){
	$current_page = get_current_page();
	$articles = list_by_category($_GET['category'], $current_page);

	$smarty->assign('articles', $articles);

	// Page set
	$smarty->assign('current_page', $current_page);
	$smarty->assign('page_limit', $page_limit);

	// Set navigation button visibility
	if($current_page == 1)
		$smarty->assign('previousPage_style', 'style="display:none;"');
	else
		$smarty->assign('previousPage_style', 'style="display:block;"');

	if($current_page == $page_limit)
		$smarty->assign('nextPage_style', 'style="display:none;"');
	else
		$smarty->assign('nextPage_style', 'style="display:block;"');

	// Navigation button name
	$smarty->assign('next', 'Next');
	$smarty->assign('back', 'Back');
}

$smarty->assign('home_page', HOME_PAGE);
$smarty->assign('list_of_articles', LIST_OF_ARTICLES);
$smarty->assign('page_navigation', PAGE_NAVIGATION);

$smarty->display(CATEGORIES_TAGS_PAGE);

?>
