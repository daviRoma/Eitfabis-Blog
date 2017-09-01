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
            $DBcomments = selectQuery(TAB_COMMENTS, "article = $article_id", "date DESC LIMIT 0, 6");
        }else{
            $page_number = ($page_number - 1) * 6;
            $condition = $page_number . ", 6";
            $DBcomments = selectQuery(TAB_COMMENTS, "article = $article_id", "date DESC LIMIT $condition");
        }
    }else{
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


// Get the maximum number of comments about one article
function get_total_comments($article_id){
    $total_comments = countRecord(TAB_COMMENTS, "article = $article_id");
    return $total_comments;
}


// Divide the total rows by 4 and return a value that represents the page
function get_maximum_comments($article_id){
    $total_comments = get_total_comments($article_id);
    $page = $total_comments / 6;

    if($total_comments % 6 == 0)
        return $page;
    else
        return substr($page+1, 0, 1);
    return $total_comments;
}


// Check if the article has comments
function has_comments($article_id){
    $total_comments = get_total_comments($article_id);
    if($total_comments > 0)
        return true;
    else
        return false;
}


// Add new comment
function add_comment($data){
    $add = insertRecord(TAB_COMMENTS, $data);
    return $add;
}

?>
