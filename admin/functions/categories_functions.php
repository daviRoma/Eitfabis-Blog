<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Get all DB table elements
function get_categoryList(){
     return selectQuery("categories", "", "name ASC");
}

// Get a selected category
function get_category($name){
    $query = selectRecord("categories", "name = '$name'");
    return $query;
}

// Delete one or more categories
function delete_category($category){
    $partOf_records = selectQuery("article_category", "category = '$category'", "article ASC");
    if(count($partOf_records) > 0){
        foreach ($partOf_records as $record) {
            $articleId = $record['article'];
            deleteRecord("article_category", $articleId);
        }
    }
    $reference_records = selectQuery("tag_category", "category = '$category'", "tag ASC");
    if(count($reference_records) > 0){
        foreach ($reference_records as $record) {
            $tagId = $record['tag'];
            deleteRecord("tag_category", $tagId);
        }
    }
    $path = get_category($category)['background'];
    deleteRecord("categories", "name = '$category'");
    delete_categoryBg($path);
}

// Delete background image linked to deleted category
function delete_categoryBg($filePath){
    unlink(_ROOT . "/" . $filePath);
}

// Insert one row in the Categories table of the DB.
function insert_category($data){
    insertRecord("categories", $data);
}

?>
