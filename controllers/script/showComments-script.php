<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/comments_functions.php';


$smarty = new Blog_Item();


$smarty->assign('comment_body', COMMENT_SECTION);

if(has_comments($_GET['article_id'])){
    $total_comments = get_maximum_comments($_GET['article_id']);
    $comments = get_recent_comments($_GET['article_id'], 1, $total_comments);
    $smarty->assign('comments', $comments);
    $smarty->assign('comments_page_limit', $total_comments);
}

$smarty->display(MODAL_LIST_OF_COMMENTS);

?>
