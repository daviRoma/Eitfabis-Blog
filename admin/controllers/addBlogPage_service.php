<?php

require_once '../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("addBlogPage_service.php", $_SESSION['role'], 1);
$error = "";


if(isset($_POST['addNewPage'])){

	if(empty($_POST['set_title']) || empty($_POST['set_subtitle']) || empty($_POST['set_position'])){
        $error = "All fields are mandatory!";
        redirect("../blog.php?error=$error", true);
    }

    if (!isset($_FILES['bg_file']) || !is_uploaded_file($_FILES['bg_file']['tmp_name'])) {
        $error = "You do not send any file.";
        redirect("../blog.php?error=$error", true);
    }

    if(isset($_FILES["bg_file"]["type"])){
        $validextensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["bg_file"]["name"]);
        $file_extension = end($temporary);

        if( (($_FILES["bg_file"]["type"] == "image/png") || ($_FILES["bg_file"]["type"] == "image/jpg") || ($_FILES["bg_file"]["type"] == "image/jpeg") ) && ($_FILES["bg_file"]["size"] < 5*MB) && in_array($file_extension, $validextensions)) {
            if ($_FILES["bg_file"]["error"] > 0){
                $error = "Return Code: " . $_FILES["bg_file"]["error"];
                redirect("../blog.php?error=$error", true);
            }else{
                if(file_exists(_ROOT . "/upload/blog/background/" . $_FILES["bg_file"]["name"])){
                    $error = $_FILES["bg_file"]["name"] . "Already exist!";
                    redirect("../blog.php?error=$error", true);
                }else{
                    $sourcePath = $_FILES['bg_file']['tmp_name'];                   // Storing source path of the file in a variable
                    $fileName = strtolower($_POST['set_position']) . "-bg-". time().'_'.basename($_FILES["bg_file"]["name"]);
                    $targetPath = _ROOT . "/upload/blog/background/" . $fileName;    // Target path where file is to be stored
                    move_uploaded_file($sourcePath, $targetPath);                   // Moving Uploaded file
                }
            }
        }else{
            $error = "Invalid file Size or Type";
            redirect("../blog.php?error=$error", true);
        }
    }

    $title = ucfirst($_POST['set_title']);
    $subtitle = ucfirst($_POST['set_subtitle']);
    $page = ucfirst(substr($_POST['set_position'], 0, 1)) . strtolower(substr($_POST['set_position'], 1));

    $connection = dbConnect();
    $data = array();
    $data['title'] = mysqli_real_escape_string($connection, $title);
    $data['subtitle'] = mysqli_real_escape_string($connection, $subtitle);
    $data['page'] = mysqli_real_escape_string($connection, $page);
    $data['background'] = "uplaod/blog/background/".$fileName;
    $data['backup'] = 1;

    insertRecord("blogInfo", $data);
    redirect("../blog.php", true);
}else{
    $error = "Cannot perform the requested operation. Data was not sent.";
    redirect("../error_page.php?typeError=500&message=$error");
}

?>
