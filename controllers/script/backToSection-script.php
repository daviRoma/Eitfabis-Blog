<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/category&tag_functions.php';


$smarty = new Blog_Item();

switch($_GET['section']){

	case 'category':
		$categories = retrieve_categories();

		$smarty->assign('current_section', 'category');
		$smarty->assign('categories', $categories);
		$smarty->assign('list_of_categories', LIST_OF_CATEGORIES);
		break;

	case 'tag':
		$smarty->assign('current_section', 'tag');

		$current_page = get_current_page();
		$page_limit = get_tag_page();
		$tags = retrieve_tags($current_page);

		$smarty->assign('tags', $tags);

		// Page set
		$smarty->assign('page_set', $current_page);
		$smarty->assign('current_page', $current_page);
		$smarty->assign('page_limit', $page_limit);

		// Set navigation button visibility
		if($current_page == 1)
			$smarty->assign('backPage_style', 0);
		else
			$smarty->assign('backPage_style', 1);

		if($current_page == $page_limit)
			$smarty->assign('nextPage_style', 0);
		else
			$smarty->assign('nextPage_style', 1);

		$smarty->assign('option', 'section=tag&');
		$smarty->assign('list_of_tags', LIST_OF_TAGS);
		$smarty->assign('page_navigation', PAGE_NAVIGATION);

		break;

	default: break;
}

$smarty->display(CATEGORIES_TAGS_PAGE);

?>
