<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/search_functions.php';


$smarty = new Blog_Item();


if(!isset($_GET['error'])){
	$articles_found = select_search_method($_POST['method'], $_POST['title'], $_POST['category'], $_POST['tag']);

	if(!is_string($articles_found)){

		$list = assign_articles($articles_found);

		$page_limit = get_page_limit($articles_found);
		$current_page = get_current_page();

		// Set navigation button visibility
		if($page_limit > 1){
			$list = split_in_page($list, $current_page);

			if($current_page == 1)
				$smarty->assign('previousPage_style', 0);
			else
				$smarty->assign('previousPage_style', 1);

			if($current_page == $page_limit)
				$smarty->assign('nextPage_style', 0);
			else
				$smarty->assign('nextPage_style', 1);

			// Set next page index
			$smarty->assign('page_set', $current_page);

			// Navigation button name
			$smarty->assign('next', 'Next');
			$smarty->assign('back', 'Back');

		}else{
			$smarty->assign('previousPage_style', 0);
			$smarty->assign('nextPage_style', 0);
		}

		$smarty->assign('subPosition', $_POST['method']);
		$smarty->assign('temp_option', $_POST['title'] . "||" . $_POST['category'] . "||" . $_POST['tag']);

		// Success message
		$success_message = count($articles_found) . " articles found.";
		$smarty->assign('success_message', $success_message);

		// Page set
		$smarty->assign('current_page', $current_page);
		$smarty->assign('page_limit', $page_limit);

		$smarty->assign('articles', $list);
		$smarty->assign('home_page', HOME_PAGE);
		$smarty->assign('list_of_articles', LIST_OF_ARTICLES);
		$smarty->assign('page_navigation', PAGE_NAVIGATION);

	}else{
		$error_message = $articles_found;
		$smarty->assign('error_message', $error_message);
	}
}else{
	$error_message = $_GET['errorMessage'];
	$smarty->assign('error_message', $error_message);
}

$smarty->assign('notice_message', NOTICE_MESSAGE);

$smarty->display(SEARCH_PAGE);

?>
