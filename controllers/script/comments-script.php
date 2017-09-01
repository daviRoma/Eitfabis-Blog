<?php

require_once '../../configs/blog_configs.php';
require_once BLOG_ROOT . '/configs/smarty_setup.php';
require_once BLOG_ROOT . '/functions/comments_functions.php';


$smarty = new Blog_Item();

if($_POST['add']){

    // insert new record in report
    $data = array();
    $data['name'] = $_POST['name'];
    $data['content'] = $_POST['content'];
    $data['article'] = $_POST['article'];

    if(add_comment($data)){
        $page_limit = get_maximum_comments($data['article']);
        $comments = get_recent_comments($data['article'], 1, $page_limit);
    }else{
        echo "ERROR";
        exit();
    }
}else{
    $requested_page = $_POST['requestedPage'];
    $page_limit = get_maximum_comments($_POST['article']);
    $comments = get_recent_comments($_POST['article'], $requested_page, $page_limit);
}

// set article comments
$smarty->assign('comments', $comments);
$smarty->assign('comments_page_limit', $page_limit);

$smarty->display(COMMENT_SECTION);

?>
