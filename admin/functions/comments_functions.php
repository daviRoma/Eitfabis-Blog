<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Returns the complete list of comments
function get_all_comments(){
    $comments = selectQuery(TAB_COMMENTS, "", "date DESC");
    return $comments;
}


// Returns the list of comments of a selected article
function get_article_comments($article_id){
    $result = array();
    $comments = selectQuery(TAB_COMMENTS, "article = $article_id", "date DESC");

    foreach($comments as $comment) {
        $list_of_elem = array();
        $list_of_elem['id'] = $comment['id'];
        $list_of_elem['name'] = $comment['name'];
        $list_of_elem['content'] = $comment['content'];
        $list_of_elem['date'] = date_format_table($comment['date']);
        $result[] = $list_of_elem;
    }
    return $result;
}


// Returns the header of the DB table Comments
function get_commentsTableHeader(){
    $table_head = array();
    $table_head[0] = "Id";
    $table_head[1] = "name";
    $table_head[2] = "Content";
    $table_head[3] = "Date";
    return $table_head;
}


// Delete one or all comments
function delete_comments($type_id, $all){
    if($all){
        deleteRecord(TAB_COMMENTS, "article = $type_id");
    }else{
        deleteRecord(TAB_COMMENTS, "id = $type_id");
    }
}


?>
