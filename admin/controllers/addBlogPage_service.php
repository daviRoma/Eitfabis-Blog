<?php

require_once '../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("addBlogPage_service.php", $_SESSION['role'], 1);


if(isset($_POST['addNewPage'])){
    $_SESSION['error'] = "";

	if(empty($_POST['set_title']) || empty($_POST['set_subtitle']) || empty($_POST['set_position'])){
        $_SESSION['error'] = "All fields are mandatory!";
        redirect("../blog.php", true);
    }

    if (!isset($_FILES['bg_file']) || !is_uploaded_file($_FILES['bg_file']['tmp_name'])) {
      $_SESSION['error'] = "You do not send any file.";
      redirect("../blog.php", true);
    }

    if(isset($_FILES["bg_file"]["type"])){
        $validextensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["bg_file"]["name"]);
        $file_extension = end($temporary);

        if( (($_FILES["bg_file"]["type"] == "image/png") || ($_FILES["bg_file"]["type"] == "image/jpg") || ($_FILES["bg_file"]["type"] == "image/jpeg") ) && ($_FILES["bg_file"]["size"] < 5*MB) && in_array($file_extension, $validextensions)) {
            if ($_FILES["bg_file"]["error"] > 0){
                $_SESSION['error'] = "Return Code: " . $_FILES["bg_file"]["error"];
                redirect("../blog.php", true);
            }else{
                if(file_exists(_ROOT . "//img/Blog/background/" . $_FILES["bg_file"]["name"])){
                    $_SESSION['error'] = $_FILES["bg_file"]["name"] . "Already exist!";
                    redirect("../blog.php", true);
                }else{
                    $sourcePath = $_FILES['bg_file']['tmp_name'];                   // Storing source path of the file in a variable
                    $fileName = strtolower($_POST['set_position']) . "-bg-". time().'_'.basename($_FILES["bg_file"]["name"]);
                    $targetPath = _ROOT . "//img/Blog/background/" . $fileName;    // Target path where file is to be stored
                    move_uploaded_file($sourcePath, $targetPath);                   // Moving Uploaded file
                }
            }
        }else{
            $_SESSION['error'] = "Invalid file Size or Type";
            redirect("../blog.php", true);
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
    $data['background'] = "img/Blog/background/".$fileName;
    $data['backup'] = 1;

    insertRecord("blogInfo", $data);
    redirect("../blog.php", true);
}else{
    redirect("../error_page.php?typeError=500&message=Cannot perform the requested operation. Data was not sent.");
}

?>
