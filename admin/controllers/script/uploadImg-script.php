<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/configs/smarty_setup.php';
require_once _ROOT . '/admin/controllers/session.php';


$path = "";
if (!isset($_FILES['upload_img_file']) || !is_uploaded_file($_FILES['upload_img_file']['tmp_name'])) {
    echo 'Non hai inviato nessun file...';
    exit;
}

if(isset($_FILES["upload_img_file"]["type"])){
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["upload_img_file"]["name"]);
    $file_extension = end($temporary);

    if((($_FILES["upload_img_file"]["type"] == "image/png") || ($_FILES["upload_img_file"]["type"] == "image/jpg") || ($_FILES["upload_img_file"]["type"] == "image/jpeg")) && ($_FILES["upload_img_file"]["size"] < 5*MB) && in_array($file_extension, $validextensions)) {
        if ($_FILES["upload_img_file"]["error"] > 0){
            echo "Return Code: " . $_FILES["upload_img_file"]["error"];
        }else{
            if(file_exists(_ROOT . "/" . "upload/post/pictures/" . $_FILES["upload_img_file"]["name"])){
                echo $_FILES["upload_img_file"]["name"] . "Already exist!";
            }else{
                $sourcePath = $_FILES['upload_img_file']['tmp_name'];           // Storing source path of the file in a variable
                $fileName = 'post-' . time().'_'.basename($_FILES["upload_img_file"]["name"]);
                $targetPath = _ROOT . "/" . "upload/post/pictures/" . $fileName;   // Target path where file is to be stored
                if(move_uploaded_file($sourcePath, $targetPath))         // Moving Uploaded file
                    $path = "upload/post/pictures/" . $fileName;
            }
        }
    }else{
        echo "Invalid file Size or Type";
    }
}
echo $path;

?>
