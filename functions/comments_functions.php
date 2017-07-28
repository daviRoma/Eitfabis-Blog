<?php

require_once BLOG_ROOT . '/functions/db_functions.php';
require_once BLOG_ROOT . '/functions/utility_functions.php';


// Retrieve information on the most recent articles.
function get_recent_comments($article_id, $page_number, $page_limit){
    $error = "";
    $result = array();

    // Recovery comments according to the page
    if($page_number <= $page_limit){

        if($page_number == 1){
            $DBcomments = selectQuery(TAB_COMMENTS, "article = $article_id", "LIMIT 0, 4");
        }else{
            $page_number = ($page_number - 1) * 4;
            $condition = $page_number . ", 4";
            $DBcomments = selectQuery(TAB_COMMENTS, "article = $article_id", "LIMIT $condition");
        }
    }else {
        $error = "Page not found";
        return $error;
    }

    foreach($DBcomments as $comment){
        $list_element = array();

        $list_element['id'] = $comment['id'];
        $list_element['name'] = $comment['name'];
        $list_element['content'] = $comment['content'];
        $list_element['date'] = date_format_uni($comment['date']);
        $list_element['article'] = $comment['article'];

        $result[] = $list_element;
    }
    return $result;
}
?>
