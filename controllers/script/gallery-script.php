<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/gallery_functions.php';


$smarty = new Blog_Item();


$requested_page = get_current_page();
$page_limit = get_total_page();

$gallery_items = retrieve_pictures($requested_page);


$smarty->assign('pictures', $gallery_items);

// Page set
$smarty->assign('current_page', $requested_page);
$smarty->assign('page_limit', $page_limit);
$smarty->assign('page_set', $requested_page);

// Set navigation button visibility
if($requested_page == 1)
    $smarty->assign('backPage_style', 0);
else
    $smarty->assign('backPage_style', 1);

if($requested_page == $page_limit)
    $smarty->assign('nextPage_style', 0);
else
    $smarty->assign('nextPage_style', 1);


$smarty->assign('page_navigation', PAGE_NAVIGATION);
$smarty->display(GALLERY_PAGE);

?>
