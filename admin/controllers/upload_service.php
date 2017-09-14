<?php

require_once '../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("upload_service.php", $_SESSION['role'], 1);


if(isset($_FILES["file"]["type"])){
    $validextensions = array("jpeg", "jpg", "png", "txt", "pdf");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);

    if(($_FILES["file"]["size"] < 5*MB) && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0){
            echo "Return Code: " . $_FILES["file"]["error"];
        }else{
            if(file_exists(_ROOT . "/upload/other/" . $_FILES["file"]["name"])){
                echo $_FILES["file"]["name"] . "Already exist!";
            }else{
                $fileName = strtolower($_SESSION['username'] . '_' . time().'_'.basename($_FILES["file"]["name"]));
                $filePath = "upload/other/" . $fileName;
                $sourcePath = $_FILES['file']['tmp_name'];              // Storing source path of the file in a variable
                $targetPath = _ROOT . "/upload/other/" . $fileName;     // Target path where file is to be stored
                if(move_uploaded_file($sourcePath, $targetPath)){          // Moving Uploaded file
                    $data = array();
                    $data['file_name'] = $fileName;
                    $data['folder'] = 'other';
                    $data['file_address'] = 'upload/other/';
                    $data['file_extension'] = $file_extension;
                    $data['gallery'] = 0;
                    $data['name'] = "No name";
                    $data['description'] = "No description";
                    insertRecord(TAB_UPLOADS, $data);
                }
            }
        }
    }else{
        echo "Invalid file Size or Type";
    }
}else{
    redirect("../error_page.php?typeError=500&message=No file sent for upload.");
}

?>
