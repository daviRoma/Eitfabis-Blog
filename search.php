<?php

require_once 'configs/blog_configs.php';
require_once 'configs/smarty_setup.php';
require_once 'functions/blog_functions.php';
require_once 'functions/search_functions.php';


$smarty = new Blog_Item();

$blog = get_blog_info('Search');

// Navbar update
$smarty->assign('reload_position', get_current_url());
$smarty->assign('position', $blog['page']);

// Page update
$smarty->assign('background', $blog['background']);
$smarty->assign('page_title', $blog['title']);
$smarty->assign('page_subtitle', $blog['subtitle']);
$smarty->assign('page', SEARCH_PAGE);

// Start search
if(isset($_GET['method'])){
	$articles_found = select_search_method($_GET['method'], $_GET['title'], $_GET['category'], $_GET['tag']);

	if(!is_string($articles_found)){

		// articles founded
		$list = assign_articles($articles_found);

		$page_limit = get_page_limit($articles_found);
		$current_page = get_current_page();

		// set navigation button visibility
		if($page_limit > 1){
			$list = split_in_page($list, $current_page);

			if($current_page == 1)
				$smarty->assign('previousPage_style', 'style="display:none;"');
			else
				$smarty->assign('previousPage_style', 'style="display:block;"');

			if($current_page == $page_limit)
				$smarty->assign('nextPage_style', 'style="display:none;"');
			else
				$smarty->assign('nextPage_style', 'style="display:block;"');

			// Additional settings for page navigation with javaScript
			$smarty->assign('subPosition', $_GET['method']);
			$smarty->assign('option', 'method=' . $_GET['method'] . "&title=" . $_GET['title'] . "&category=" . $_GET['category'] . "&tag=" . $_GET['tag'] . "&");
			$smarty->assign('temp_option', $_GET['title'] . "||" . $_GET['category'] . "||" . $_GET['tag']);

			// Set next page index
			$smarty->assign('page_set', $current_page);

			// Navigation button name
			$smarty->assign('next', 'Next');
			$smarty->assign('back', 'Back');

		}else{
			$smarty->assign('previousPage_style', 'style="display:none;"');
			$smarty->assign('nextPage_style', 'style="display:none;"');
		}

		// success message
		$success_message = count($articles_found).' articles found.';
		$smarty->assign('success_message', $success_message);

		// Page set
		$smarty->assign('current_page', $current_page);
		$smarty->assign('page_limit', $page_limit);

		$smarty->assign('articles', $list);
		$smarty->assign('home_page', HOME_PAGE);
		$smarty->assign('list_of_articles', LIST_OF_ARTICLES);
		$smarty->assign('page_navigation', PAGE_NAVIGATION);

	}else{
		$error_message = $articels_found;
		$smarty->assign('error_message', $error_message);
	}
}

$smarty->assign('notice_message', NOTICE_MESSAGE);

// if all fiels are empty
if(isset($_GET['error']))
	$smarty->assign('error_message', $_GET['typeError']);


unset($_GET);

$smarty->display(STARTER);

?>
