<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/category&tag_functions.php';


$smarty = new Blog_Item();

switch($_GET['section']){

	case 'category':
		$categories = retrieve_categories();
		$smarty->assign('categories', $categories);
		$smarty->assign('list_of_categories', LIST_OF_CATEGORIES);
		break;

	case 'tag':
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
			$smarty->assign('backTags_style', 'style="pointer-events:none; cursor:default; opacity:0.3;"');
		else
			$smarty->assign('backTags_style', 'style="display:block;"');

		if($current_page == $page_limit)
			$smarty->assign('nextTags_style', 'style="pointer-events:none; cursor:default; opacity:0.3;"');
		else
			$smarty->assign('nextTags_style', 'style="display:block;"');

		$smarty->assign('option', 'section=tag&');
		$smarty->assign('list_of_tags', LIST_OF_TAGS);
		$smarty->assign('page_navigation', PAGE_NAVIGATION);

		break;

	default: break;
}

$smarty->display(CATEGORIES_TAGS_PAGE);

?>
