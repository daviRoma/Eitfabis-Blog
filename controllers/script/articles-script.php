<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/category&tag_functions.php';


$smarty = new Blog_Item();

$requested_page = get_current_page();

// Select the current navigation according to the host position
switch($_GET['position']){

    case "Home":
        $page_limit = get_page_limit(null);

        $articles = retrieve_recent($requested_page, $page_limit);

        $list = assign_articles($articles);

        // Navigation button name
        $smarty->assign('next', 'Older Posts');
        $smarty->assign('back', 'Recent Posts');

        break;

    case "Category & Tag":
        $section = "";
        if(stristr($_GET['option_1'], "category"))
            $section = "category";
        if(stristr($_GET['option_1'], "tag"))
            $section =  "tag";

        $page_limit = get_total_page($_GET['option_2'], $section);

        $articles = list_by_option($section, $_GET['option_2'], $requested_page);

        // Set sub-Position for page navigation
        $smarty->assign('subPosition', 'section='.$section.'&name='.$_GET['option_2']);
        $smarty->assign('option', 'section='.$section.'&name='.$_GET['option_2']."&");

        $list = assign_articles($articles);

        // Navigation button name
        $smarty->assign('next', 'Next');
        $smarty->assign('back', 'Back');

        break;

    case "Search":
        $options = explode("||", $_GET['option_2']);

        $articles_found = select_search_method($_GET['option_1'], $options[0], $options[1], $options[2]);

        $list = assign_articles($articles_found);

        $page_limit = get_page_limit($articles_found);

        $list = split_in_page($list, $requested_page);

        $smarty->assign('subPosition', $_GET['option_1']);
        $smarty->assign('temp_option', $options[0] . "||" . $options[1] . "||" . $options[2]);

        // Navigation button name
        $smarty->assign('next', 'Next');
        $smarty->assign('back', 'Back');

    default: break;
}


// Set navigation button visibility
if($requested_page == 1)
    $smarty->assign('previousPage_style', 0);
else
    $smarty->assign('previousPage_style', 1);

if($requested_page == $page_limit)
    $smarty->assign('nextPage_style', 0);
else
    $smarty->assign('nextPage_style', 1);


// Page set
$smarty->assign('current_page', $requested_page);
$smarty->assign('page_limit', $page_limit);

// Home-page display
$smarty->assign('home_style', 'style="display:none;"');
$smarty->assign('articles', $list);


$smarty->assign('list_of_articles', LIST_OF_ARTICLES);
$smarty->assign('page_navigation', PAGE_NAVIGATION);

$smarty->display(HOME_PAGE);

?>
