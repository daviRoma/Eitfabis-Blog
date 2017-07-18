<?php

require_once '../configs/admin_configs.php';
require_once _ROOT . '/admin/functions/tags_functions.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("tag_service.php", $_SESSION['role'], 1);


// Add new tags
if(isset($_POST['addNewTags'])){
    $error = "";
    $tags_number = $_POST['tagsNumber'] + 1;
    $tags = array();

    // Check empty fileds
    if(empty($_POST['category'])){
        $error = "Category not insered.";
        redirect("../tags.php?error=$error", true);
    }

    for($i = 1; $i < $tags_number; $i++){
        $tags[$i]['label'] = $_POST['setTagLabel_'.$i];
        $tags[$i]['description'] = $_POST['setTagDescription_'.$i];
        if(empty($tags[$i]['label']) || empty($tags[$i]['description']))
            redirect("../tags.php?error=All fields are mandatory!", true);
    }

    // Check tags data
    foreach($tags as $tag){
        $check_tag = get_tagByLabel($tag['label']);
        if(count($check_tag) > 0){
            $error = "Tag " . $tag['label'] . "already exist!";
            redirect("../tags.php?error=$error", true);
        }
    }

    // Insert value into Tag DB table
    $data_1 = array();
    $count = 0;
    foreach($tags as $tag){
        $data_1[$count] = insert_tag($tag);
        if(!$data_1[$count]){
            $error = "Error insert query. Probably some queries have been successful.";
            redirect("../error_page?typeError=500&message=$error");
        }
        $count++;
    }

    // Inser value into Reference DB table
    $category = $_POST['category'];
    $data_2 = array();
    foreach ($data_1 as $id) {
        $data_2['tag'] = $id;
        $data_2['category'] = $category;
        insert_tag($data_2);
    }

    redirect("../tags.php", true);
}else{
    redirect("../error_page.php?typeError=500&message=Cannot perform the requested operation. Data was not sent.");
}

?>
