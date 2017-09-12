<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/categories_functions.php';


// Edit category
if($_POST['operation'] == 'edit'){
    $id = $_POST['category_id'];
    $new_data = array("name" => $_POST['new_name'], "description" => $_POST['new_description']);
    update_category($id, $new_data);
}

// Delete category
if($_POST['operation'] == 'delete'){
    delete_category($_POST['category_id']);
}

// Upload category background
if($_POST['operation'] == 'upload_img'){
    $category = get_category_by_id($_POST['id']);

    if(isset($_FILES["category_bg_file"]["type"])){
        $validextensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["category_bg_file"]["name"]);
        $file_extension = end($temporary);

        if((($_FILES["category_bg_file"]["type"] == "image/png") || ($_FILES["category_bg_file"]["type"] == "image/jpg") || ($_FILES["category_bg_file"]["type"] == "image/jpeg") ) && ($_FILES["category_bg_file"]["size"] < 5*MB) && in_array($file_extension, $validextensions)) {
            if ($_FILES["category_bg_file"]["error"] > 0){
                $error = "Return Code: " . $_FILES["category_bg_file"]["error"];
                redirect("../categories.php?error=$error", true);
            }else{
                $fileName = strtolower($category['name'] . "_" .time() . "." . $file_extension);

                if(file_exists(_ROOT . "/upload/blog/category/" . $fileName)){
                    $error = $fileName . "Already exist!";
                    redirect("../categories.php?error=$error", true);
                }else{
                    $filePath = "/upload/blog/category/" . $fileName;
                    $sourcePath = $_FILES['category_bg_file']['tmp_name'];   // Storing source path of the file in a variable
                    $targetPath = _ROOT . $filePath;                    // Target path where file is to be stored
                    move_uploaded_file($sourcePath, $targetPath);       // Moving Uploaded file
                    unlink(_ROOT . "/" . $category['background']);
                    update_category($category['id'], array("background" => "upload/blog/category/" . $fileName));
                }
            }
        }else{
            $error = "Invalid file Size or Type";
            redirect("../categories.php?error=$error", true);
        }
    }
}

?>
