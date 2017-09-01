<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Get all DB table elements
function get_categoryList(){
     return selectQuery(TAB_CATEGORIES, "", "name ASC");
}

// Get a selected category
function get_category_by_name($name){
    $query = selectRecord(TAB_CATEGORIES, "name = '$name'");
    return $query;
}

// Get a selected category
function get_category_by_id($id){
    $query = selectRecord(TAB_CATEGORIES, "id = $id");
    return $query;
}

// Delete one or more categories
function delete_category($category_id){
    $path = get_category_by_id($category_id)['background'];

    deleteRecord(TAB_ART_CAT, "category = $id");
    deleteRecord(TAB_TAG_CAT, "category = $id");
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

// Update category
function update_category($id, $data){
    updateRecord(TAB_CATEGORIES, $new_data, "id = $id");
}

?>
