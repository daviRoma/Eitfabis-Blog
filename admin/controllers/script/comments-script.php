<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/configs/smarty_setup.php';
require_once _ROOT . '/admin/functions/comments_functions.php';

$smarty = new Admin_Item();

switch ($_POST['operation']) {

    case 1:     // Show Comments
        break;

    case 2:     // Delete comment
        delete_comments($_POST['comment_id'], false);
        break;

    case 3:     // Delete all comments
        delete_comments($_POST['article_id'], true);
        break;
    default: break;
}

$heads = get_commentsTableHeader();
$comments = get_article_comments($_POST['article_id']);

$smarty->assign('heads', $heads);

if(count($comments) > 0){
    $smarty->assign('basic_rows', $comments);
}else{
    $smarty->assign("empty_rows", "No comments were written.");
}

$smarty->display(TABLES_BASIC);

?>
