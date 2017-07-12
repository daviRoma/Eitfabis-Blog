<?php

require_once '../configs/admin_configs.php';
require_once _ROOT . '/admin/functions/categories_functions.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("category_service.php", $_SESSION['role'], 1);

// Add new category
if(isset($_POST['addNewCategory'])){
    $error = "";

    // Check empty fields
	if(empty($_POST['setCategoryName']) || empty($_POST['setCategoryDescription'])){
        $error = "All fields are mandatory!";
        redirect("../categories.php?error=$error", true);
    }

    if (!isset($_FILES['bg_file']) || !is_uploaded_file($_FILES['bg_file']['tmp_name'])){
        $error = "You do not send any file.";
        redirect("../categories.php?error=$error", true);
    }

    // Check existing category
    $name = ucfirst($_POST['setCategoryName']);
    $description = ucfirst($_POST['setCategoryDescription']);

    $check_category = selectRecord("categories", "name = '$name'");
    if(count($check_category) > 0)
        redirect("../categories.php?error=Category already exist!", true);

    // Upload
    if(isset($_FILES["bg_file"]["type"])){
        $validextensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["bg_file"]["name"]);
        $file_extension = end($temporary);

        if( (($_FILES["bg_file"]["type"] == "image/png") || ($_FILES["bg_file"]["type"] == "image/jpg") || ($_FILES["bg_file"]["type"] == "image/jpeg") ) && ($_FILES["bg_file"]["size"] < 5*MB) && in_array($file_extension, $validextensions)) {
            if ($_FILES["bg_file"]["error"] > 0){
                $error = "Return Code: " . $_FILES["bg_file"]["error"];
                redirect("../categories.php?error=$error", true);
            }else{
                $fileName = strtolower(str_replace(' ', '_', $name. "." . $file_extension));

                if(file_exists(_ROOT . "/uplaod/blog/category/" . $fileName)){
                    $error = $fileName . "Already exist!";
                    redirect("../categories.php?error=$error", true);
                }else{
                    $sourcePath = $_FILES['bg_file']['tmp_name'];                   // Storing source path of the file in a variable
                    $targetPath = _ROOT . "/upload/blog/category/" . $fileName;    // Target path where file is to be stored
                    move_uploaded_file($sourcePath, $targetPath);                   // Moving Uploaded file
                }
            }
        }else{
            $error = "Invalid file Size or Type";
            redirect("../categories.php?error=$error", true);
        }
    }

    // Insert value into DB
    $data = array();
    $data['name'] = $name;
    $data['description'] = $description;
    $data['background'] = "upload/blog/category/" . $fileName;

    insert_category($data);
    redirect("../categories.php", true);
}else{
    redirect("../error_page.php?typeError=500&message=Cannot perform the requested operation. Data was not sent.");
}

// Delete existing category
if(isset($_POST['deleteCategory'])){
    $category = $_POST['deleteCategory'];
    delete_category($category);
}else{
    redirect("../error_page.php?typeError=500&message=Cannot perform the requested operation. Data was not sent.");
}

?>
