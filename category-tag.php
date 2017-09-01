<?php

require_once 'configs/blog_configs.php';
require_once 'configs/smarty_setup.php';
require_once 'functions/blog_functions.php';
require_once 'functions/category&tag_functions.php';


$smarty = new Blog_Item();

$blog = get_blog_info('Category & Tag');


// Navbar update
$smarty->assign('reload_position', get_current_url());
$smarty->assign('position', $blog['page']);

// Page update
$smarty->assign('background', $blog['background']);
$smarty->assign('page_title', $blog['title']);
$smarty->assign('page_subtitle', $blog['subtitle']);
$smarty->assign('page', CATEGORIES_TAGS_PAGE);


switch($_GET['section']){

	case 'category':
		$smarty->assign('current_section', 'category');
		if(!isset($_GET['name'])){
			$categories = retrieve_categories();
			$smarty->assign('categories', $categories);
			$smarty->assign('list_of_categories', LIST_OF_CATEGORIES);

		}else{

			$category = category_by_name($_GET['name']);
			$page_limit = get_total_page($_GET['name'], "category");

			$smarty->assign('section', "category");
			$smarty->assign('category', $category);

			if($page_limit > 0){
				$current_page = get_current_page();
				$articles = list_by_category($_GET['name'], $current_page);

				$smarty->assign('articles', $articles);

				// Page set
				$smarty->assign('current_page', $current_page);
				$smarty->assign('page_set', $current_page);
				$smarty->assign('page_limit', $page_limit);

				// set navigation button visibility
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

				$smarty->assign('subPosition', 'section=category&name='.$_GET['name']);
				$smarty->assign('option', 'section=category&'.'name='.$_GET['name']."&");
				$smarty->assign('home_page', HOME_PAGE);
				$smarty->assign('list_of_articles', LIST_OF_ARTICLES);
				$smarty->assign('page_navigation', PAGE_NAVIGATION);
			}
		}
		break;

	case 'tag':
		$smarty->assign('current_section', 'tag');
		if(!isset($_GET['name'])){
			$current_page = get_current_page();
			$page_limit = get_tag_page();
			$tags = retrieve_tags($current_page);

			$smarty->assign('tags', $tags);

			if($page_limit > 0){
				// set navigation button visibility
				if($current_page == 1)
					$smarty->assign('backPage_style', 0);
				else
					$smarty->assign('backPage_style', 1);

				if($current_page == $page_limit)
					$smarty->assign('nextPage_style', 0);
				else
					$smarty->assign('nextPage_style', 1);

				// Page set
				$smarty->assign('page_set', $current_page);
				$smarty->assign('current_page', $current_page);
				$smarty->assign('page_limit', $page_limit);
			}else{
				$smarty->assign('backPage_style', 0);
				$smarty->assign('nextPage_style', 0);
				// Page set
				$smarty->assign('page_set', 1);
				$smarty->assign('current_page', 1);
				$smarty->assign('page_limit', 1);
			}

			$smarty->assign('option', 'section=tag&');
			$smarty->assign('list_of_tags', LIST_OF_TAGS);
			$smarty->assign('page_navigation', PAGE_NAVIGATION);

		}else{

			$tag = tag_by_name($_GET['name']);
			$page_limit = get_total_page($_GET['name'], "tag");

			$smarty->assign('section', "tag");
			$smarty->assign('tag', $tag);

			if($page_limit > 0){
				$current_page = get_current_page();
				$articles = list_by_tag($_GET['name'], $current_page);

				$smarty->assign('articles', $articles);

				// Page set
				$smarty->assign('current_page', $current_page);
				$smarty->assign('page_set', $current_page);
				$smarty->assign('page_limit', $page_limit);

				// set navigation button visibility
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

				$smarty->assign('subPosition', 'section=tag&name='.$_GET['name']);
				$smarty->assign('option', 'section=tag&'.'name='.$_GET['name']."&");
				$smarty->assign('home_page', HOME_PAGE);
				$smarty->assign('list_of_articles', LIST_OF_ARTICLES);
				$smarty->assign('page_navigation', PAGE_NAVIGATION);
			}
		}
		break;

	default: break;
}

$smarty->display(STARTER);

?>
