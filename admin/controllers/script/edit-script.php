<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/functions/set_of_functions.php';


switch ($_POST['position']) {
    case 'Article Management':
        $set_row = restructure_articleRow($_POST['row'], false);

        if($_POST['operation'] == "edit"){
            $data = check_articleRow($set_row);
            if(is_string($data)){
                echo "Error: " . $data;
            }else{
                set_article($data, $_POST['oldId']);
                $rowObject = push_articleRowObject($data);
                echo $rowObject;
            }
        }
        // Add operation not allowed
        break;

    case 'Gallery':
        $set_row = restructure_upload($_POST['row'], false);

        if($_POST['operation'] == "edit"){
            $data = check_uploadFields($set_row, $_POST['oldId']);
            if(is_string($data)){
                echo "Error: " . $data;
            }else{
                set_upload($data, $_POST['oldId']);
                $rowObject = push_uploadRowObject($data);
                echo $rowObject;
            }
        }
        // Add operation not allowed
        break;

    case 'Subscribers':
        $set_row = restructure_sub($_POST['row'], false);

        if($_POST['operation'] == "edit"){
            $data = check_subFields($set_row);
            if(is_string($data)){
                echo "Error: " . $data;
            }else{
                set_subscriber($data, $_POST['oldId']);
                $rowObject = push_subscribersRowObject($data);
                echo $rowObject;
            }
        }
        if($_POST['operation'] == "add"){
            $data = check_subFields($set_row);
            if(is_string($data)){
                echo $data;
                exit;
            }else{
                insertRecord(TAB_SUBSCRIBERS, $data);
                echo "Success! One new row insered";
            }
        }
        break;

    case 'Blog':
        $set_row = restructure_blog($_POST['row'], false);

        if($_POST['operation'] == "edit"){
            $data = check_blogFields($set_row);
            if(is_string($data)){
                echo "Error: " . $data;
            }else{
                set_blogInfo($data, $_POST['oldId']);
                $rowObject = push_BlogInfoRowObject($data);
                echo $rowObject;
            }
        }
        if($_POST['operation'] == "add"){
            $data = check_blogFields($set_row);
            if(is_string($data)){
                echo $data;
                exit;
            }else{
                insertRecord(TAB_BLOGINFO, $data);
                echo "Success! One new row insered";
            }
        }
        break;

    case 'Users':
        $set_row = restructure_usrGroup($_POST['row'], false);

        if($_POST['operation'] == "edit"){
            $data = check_userGroup($set_row);
            if(is_string($data)){
                echo "Error: " . $data;
            }else{
                set_userGroup($data, $_POST['oldId']);
                $rowObject = push_usrRowObject($data);
                echo $rowObject;
            }
        }
        if($_POST['operation'] == "add"){
            $data = check_userGroup($set_row);
            if(is_string($data)){
                echo $data;
                exit;
            }else{
                insert_userGroup($data);
                echo "Success: New user added.";
            }
        }
        break;

    case 'Tags':
        $set_row = restructure_tag($_POST['row'], false);

        if($_POST['operation'] == "edit"){
            $data = check_tagFields($set_row);
            if(is_string($data)){
                echo "Error: " . $data;
            }else{
                set_tag($data, $_POST['oldId']);
                $rowObject = push_tagRowObject($data);
                echo $rowObject;
            }
        }
        if($_POST['operation'] == "add"){
            $data = check_tagFields($set_row);
            if(is_string($data)){
                echo $data;
                exit;
            }else{
                insert_tag($data);
                echo "Success! New tag insered";
            }
        }
        break;

    default : break;
}

?>
