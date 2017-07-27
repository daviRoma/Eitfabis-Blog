<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/categories_functions.php';


// Edit category
if($_POST['operation'] == 'edit'){
    $id = $_POST['category_id'];
    $new_data = array("name" => $_POST['new_name'], "description" => $_POST['new_description']);
    updateRecord(TAB_CATEGORIES, $new_data, "id = $id");
}

// Delete category
if($_POST['operation'] == 'delete'){
    delete_category($_POST['category_id']);
}

?>
