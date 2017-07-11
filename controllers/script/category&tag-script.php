<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/category&tag_functions.php';


$smarty = new Blog_Item();

switch($_GET['section']){

	case 'category':
		$categories = retrieve_categories();

		$smarty->assign('categories', $categories);
        $smarty->display(LIST_OF_CATEGORIES);
		break;

	case 'tag':
		$current_page = get_current_page();
		$page_limit = get_tag_page();
		$tags = retrieve_tags($_GET['currentPage']);

		$smarty->assign('tags', $tags);

		// Page set
		$smarty->assign('page_set', $current_page);
		$smarty->assign('current_page', $current_page);
		$smarty->assign('page_limit', $page_limit);


		// Set navigation button visibility
		if($current_page == 1)
			$smarty->assign('backPage_style', 'style="pointer-events:none; cursor:default; opacity:0.3;"');
		else
			$smarty->assign('backPage_style', 'style="display:block;"');

		if($current_page == $page_limit)
			$smarty->assign('nextPage_style', 'style="pointer-events:none; cursor:default; opacity:0.3;"');
		else
			$smarty->assign('nextPage_style', 'style="display:block;"');

		$smarty->assign('option', 'section=tag&');
		$smarty->assign('page_navigation', PAGE_NAVIGATION);
		$smarty->display(LIST_OF_TAGS);
		break;

	default: break;
}

?>
