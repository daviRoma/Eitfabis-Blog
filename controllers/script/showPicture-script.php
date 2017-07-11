<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/gallery_functions.php';


$smarty = new Blog_Item();

$list = retrieve_pictures(null);

if($_GET['key'] == count($list))
    $_GET['key'] = 0;

if($_GET['key'] <= -1)
    $_GET['key'] = count($list) - 1;

$key = $_GET['key'];


$picture = get_picture($list[$key]['id']);

$smarty->assign('picture_key', $_GET['key']);
$smarty->assign('image', $picture['image']);
$smarty->assign('name', $picture['name']);
$smarty->assign('description', $picture['description']);

// Go to article
$smarty->assign('article_id', $picture['article_id']);
$smarty->assign('article_title', $picture['article_title']);


$smarty->display(MODAL_WINDOW);

?>
