<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/configs/smarty_setup.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/profile_functions.php';



if (!isset($_FILES['avatar_file']) || !is_uploaded_file($_FILES['avatar_file']['tmp_name'])) {
    $error = "You don't send any file";
    redirect("../profile.php?error=$error", true);
    exit;
}

$userId = $_SESSION['userId'];
$user_avatar = get_userAvatar($userId);

if($user_avatar){
    unlink(get_userAvatar($userId));    // Remove old user avatar form server
}

if(isset($_FILES["avatar_file"]["type"])){
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["avatar_file"]["name"]);
    $file_extension = end($temporary);

    if((($_FILES["avatar_file"]["type"] == "image/png") || ($_FILES["avatar_file"]["type"] == "image/jpg") || ($_FILES["avatar_file"]["type"] == "image/jpeg") ) && ($_FILES["avatar_file"]["size"] < 5*MB) && in_array($file_extension, $validextensions)) {
        if ($_FILES["avatar_file"]["error"] > 0){
            $error = "Return Code: " . $_FILES["avatar_file"]["error"];
            redirect("../profile.php?error=$error", true);
        }else{
            $fileName = strtolower("user-bg-". time() .'_' . basename($_FILES["avatar_file"]["name"]));

            if(file_exists(_ROOT . "/upload/user/" . $fileName)){
                $error = $fileName . "Already exist!";
                redirect("../profile.php?error=$error", true);
            }else{
                $filePath = "/upload/user/" . $fileName;
                $sourcePath = $_FILES['avatar_file']['tmp_name'];   // Storing source path of the file in a variable
                $targetPath = _ROOT . $filePath;                    // Target path where file is to be stored
                move_uploaded_file($sourcePath, $targetPath);       // Moving Uploaded file
            }
        }
    }else{
        $error = "Invalid file Size or Type";
        redirect("../profile.php?error=$error", true);
    }
}

// Update DB column about new avatar
$new_path = "upload/user/" . $fileName;
update_avatar($userId, $new_path);

$_SESSION['userPicture'] = $filePath;   // update avatar

echo $filePath;

?>
