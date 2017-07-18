<?php

require_once '../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/articles_functions.php';
require_once _ROOT . '/admin/functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("article_service.php", $_SESSION['role'], 1);


if(isset($_POST['public'])){
    $error = "";

    // Check if the article that we want to insert is a draft or no
    if($_POST['is_draft']){
        $is_draft = $_POST['is_draft'];
        $draft_id = $_POST['draftId'];
    }else{
        $is_draft = $_POST['is_draft'];
        $draft_id = false;
    }

    // Check empty fields
	if(empty($_POST['setTitle']) || empty($_POST['setSubtitle']) || empty($_POST['articleContent']) || empty($_POST['setCategory'])){
        $error = "All fields are mandatory!";
        redirect("../index.php?error=$error", true);
    }

    if (!isset($_FILES['bg_file']) || !is_uploaded_file($_FILES['bg_file']['tmp_name'])) {
      $error = "You do not send any background file.";
      redirect("../index.php?error=$error", true);
    }

    if(isset($_FILES["bg_file"]["type"])){
        $validextensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["bg_file"]["name"]);
        $file_extension = end($temporary);

        if( (($_FILES["bg_file"]["type"] == "image/png") || ($_FILES["bg_file"]["type"] == "image/jpg") || ($_FILES["bg_file"]["type"] == "image/jpeg") ) && ($_FILES["bg_file"]["size"] < 5*MB) && in_array($file_extension, $validextensions)) {
            if ($_FILES["bg_file"]["error"] > 0){
                $error = "Return Code: " . $_FILES["bg_file"]["error"];
                redirect("../index.php?error=$error", true);
            }else{
                $fileName = strtolower("post-bg-". time() .'_' . basename($_FILES["bg_file"]["name"]));

                if(file_exists(_ROOT . "/upload/post/background/" . $fileName)){
                    $error = $fileName . "Already exist!";
                    redirect("../index.php?error=$error", true);
                }else{
                    $sourcePath = $_FILES['bg_file']['tmp_name'];                   // Storing source path of the file in a variable
                    $targetPath = _ROOT . "/upload/post/background/" . $fileName;    // Target path where file is to be stored
                    move_uploaded_file($sourcePath, $targetPath);                   // Moving Uploaded file
                }
            }
        }else{
            $error = "Invalid file Size or Type";
            redirect("../index.php?error=$error", true);
        }
    }

    $title = ucfirst($_POST['setTitle']);
    $subtitle = ucfirst($_POST['setSubtitle']);
    $content = $_POST['articleContent'];
    $category = $_POST['setCategory'];
    $file_number = $_POST['fileNumber'];
    $uploads = array();

    while($file_number > 0){
        $count = $file_number - 1;
        if(isset($_POST['set_img_file_'.$count]))
            $uploads[] = $_POST['set_img_file_'.$count];
        $file_number--;
    }

    // Get tags label
    $flag = true;
    if($_POST['setTag_1'] != "default"){
        $tags = array();
        if($_POST['setTag_1'] != "default" && $_POST['setTag_2'] != "default" && $_POST['setTag_3'] != "default"){
            $temp = $_POST['setTag_1'];
            $tags[0] = selectRecord(TAB_TAGS, "label = '$temp'");
            $temp = $_POST['setTag_2'];
            $tags[1] = selectRecord(TAB_TAGS, "label = '$temp'");
            $temp = $_POST['setTag_3'];
            $tags[2] = selectRecord(TAB_TAGS, "label = '$temp'");
        }else{
            if($_POST['setTag_1'] != "default" && $_POST['setTag_2'] != "default"){
                $temp = $_POST['setTag_1'];
                $tags[0] = selectRecord(TAB_TAGS, "label = '$temp'");
                $temp = $_POST['setTag_2'];
                $tags[1] = selectRecord(TAB_TAGS, "label = '$temp'");
            }else{
                $temp = $_POST['setTag_1'];
                $tags[0] = selectRecord(TAB_TAGS, "label = '$temp'");
            }
        }
    }else{
        $flag = false;
    }


    // Insert article
    $data_1 = array();
    $data_1['title'] = $title;
    $data_1['subtitle'] = $subtitle;
    $data_1['content'] = $content;
    $data_1['background'] = "upload/post/background/" . $fileName;
    $data_1['draft'] = 0;
    $data_1['author'] = $_SESSION['username'];
    $id = insert_article($data_1, $is_draft, $draft_id);
    if(!$id){
        unlink($targetPath);
        $error = "Impossible to insert article";
        redirect("../index.php?error=$error", true);
    }

    // Insert part_of (relation between article and category)
    $data_2 = array();
    $data_2['article'] = $id;
    $data_2['category'] = $category;
    insert_articlesCategory($data_2, $is_draft, $draft_id);

    // Insert has (relation between article and tag)
    if($flag){
        $data_3 = array();
        $data_3['article'] = $id;
        foreach ($tags as $tag) {
            $data_3['tag'] = $tag['id'];
            insert_articlesTags($data_3, $is_draft, $draft_id);
        }
    }

    // Insert upload file paths into upload
    if(count($uploads) > 0){
        $data_4 = array();
        foreach($uploads as $upload) {
            $data_4['file_name'] = $upload;
            $data_4['folder'] = "post";
            $data_4['file_address'] = "upload/post/pictures/";
            $ext = explode(".", $upload);
            $data_4['file_extension'] = $ext[count($ext)-1];
            $data_4['gallery'] = 0;
            $data_4['name'] = "No name";
            $data_4['description'] = "No description";
            $uploadId = insertRecord(TAB_UPLOADS, $data_4);
            $data_plus = array();
            $data_plus['article'] = $id;
            $data_plus['upload'] = $uploadId;
            insertRecord(TAB_ART_UPL, $data_plus);
        }
    }

    // Insert make (relation between user and articles)
    $data_5 = array();
    $data_5['article'] = $id;
    $data_5['userId'] = $_SESSION['userId'];
    insertRecord(TAB_USR_ART, $data_5);

    if($is_draft){
        redirect("../articles.php?section=draft", true);
    }else{
        redirect("../index.php", true);
    }
}else{
    $error = "Cannot perform the requested operation. Data was not sent.";
    redirect("../error_page.php?typeError=500&message=$error");
}

?>
