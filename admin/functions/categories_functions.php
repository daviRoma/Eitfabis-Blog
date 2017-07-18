<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Get all DB table elements
function get_categoryList(){
     return selectQuery(TAB_CATEGORIES, "", "name ASC");
}

// Get a selected category
function get_category($name){
    $query = selectRecord(TAB_CATEGORIES, "name = '$name'");
    return $query;
}

// Delete one or more categories
function delete_category($category){
    $partOf_records = selectQuery(TAB_ART_CAT, "category = '$category'", "article ASC");
    if(count($partOf_records) > 0){
        foreach ($partOf_records as $record) {
            $articleId = $record['article'];
            deleteRecord(TAB_ART_CAT, $articleId);
        }
    }
    $reference_records = selectQuery("TAB_TAG_CAT", "category = '$category'", "tag ASC");
    if(count($reference_records) > 0){
        foreach ($reference_records as $record) {
            $tagId = $record['tag'];
            deleteRecord(TAB_TAG_CAT, $tagId);
        }
    }
    $path = get_category($category)['background'];
    deleteRecord(TAB_CATEGORIES, "name = '$category'");
    delete_categoryBg($path);
}

// Delete background image linked to deleted category
function delete_categoryBg($filePath){
    unlink(_ROOT . "/" . $filePath);
}

// Insert one row in the Categories table of the DB.
function insert_category($data){
    insertRecord(TAB_CATEGORIES, $data);
}

?>
