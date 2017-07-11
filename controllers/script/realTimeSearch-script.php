<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/category&tag_functions.php';


$smarty = new Blog_Item();

if($_POST['section'] == "section=category"){
    $categories = retrieve_categories();
    if($_POST['text'] != ""){
        $result = array();
        foreach($categories as $category) {
            if(stristr($category['name'], $_POST['text'])){
                $result[] = $category;
            }
        }
        $smarty->assign('categories', $result);
    }else{
        $smarty->assign('categories', $categories);
    }
    $smarty->display(LIST_OF_CATEGORIES);
}

if($_POST['section'] == "section=tag"){
    $tags = retrieve_all_tags();
    if($_POST['text'] != ""){
        $result = array();
        foreach($tags as $tag) {
            if(stristr($tag['label'], $_POST['text'])){
                $result[] = $tag;
            }
        }
        $smarty->assign('tags', $result);
        $smarty->assign('page_set', 1);
		$smarty->assign('current_page', 1);
		$smarty->assign('page_limit', 1);
        $smarty->assign('option', 'section=tag&');
        $smarty->assign('backPage_style', 'style="pointer-events:none; cursor:default; opacity:0.3;"');
        $smarty->assign('nextPage_style', 'style="pointer-events:none; cursor:default; opacity:0.3;"');
    }else{
        $current_page = get_current_page();
        $page_limit = get_tag_page();
        $tags = retrieve_tags($current_page);

        $smarty->assign('tags', $tags);

        // Page set
        $smarty->assign('page_set', $current_page);
        $smarty->assign('current_page', $current_page);
        $smarty->assign('page_limit', $page_limit);


        // set navigation button visibility
        if($current_page == 1)
            $smarty->assign('backPage_style', 'style="pointer-events:none; cursor:default; opacity:0.3;"');
        else
            $smarty->assign('backPage_style', 'style="display:block;"');

        if($current_page == $page_limit)
            $smarty->assign('nextPage_style', 'style="pointer-events:none; cursor:default; opacity:0.3;"');
        else
            $smarty->assign('nextPage_style', 'style="display:block;"');

        $smarty->assign('option', 'section=tag&');
    }
    $smarty->assign('page_navigation', PAGE_NAVIGATION);
    $smarty->display(LIST_OF_TAGS);
}
