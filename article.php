<?php

require_once 'configs/blog_configs.php';
require_once 'configs/smarty_setup.php';
require_once 'functions/articles_functions.php';


$smarty = new Blog_Item();

// Navbar update
$smarty->assign('reload_position', get_current_url());
$smarty->assign('position', 'Article');

// Page update
$smarty->assign('page', POST_PAGE);

// article content
$article = retrieve_article($_GET['id']);

// background picture
$smarty->assign('background', $article['background']);

// set article content
$smarty->assign('id', $article['id']);
$smarty->assign('title', $article['title']);
$smarty->assign('subtitle', $article['subtitle']);
$smarty->assign('author', $article['author']);
$smarty->assign('date', $article['date']);
$smarty->assign('content', $article['content']);
$smarty->assign('num_comments', $article['comments']);

// set article footer
$smarty->assign('category', $article['category']);
$smarty->assign('tags', $article['tags']);


$smarty->display(STARTER);

?>
