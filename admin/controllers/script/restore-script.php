<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/functions/set_of_functions.php';


switch ($_POST['position']) {
    case 'Subscribers':
        if($_POST["operation"] == "delete"){
            $restore = restructure_sub($_POST['row'], true);
            insert_subscriber($restore, $_POST['number']);
        }
        if($_POST["operation"] == "edit"){
            $restore = restructure_sub($_POST['row'], false);
            set_subscriber($restore, $_POST['oldId']);
            $restoreObject = push_subscribersRowObject($restore);
            echo $restoreObject;
        }
        break;

    case 'Blog':
        if($_POST["operation"] == "delete"){
            $restore = restructure_blog($_POST['row'], true);
            insert_blogInfo($restore, $_POST['number']);
        }
        if($_POST["operation"] == "edit"){
            $restore = restructure_blog($_POST['row'], false);
            set_blogInfo($restore, $_POST['oldId']);
            $restoreObject = push_BlogInfoRowObject($restore);
            echo $restoreObject;
        }
        break;

    case 'Users':
        if($_POST["operation"] == "delete"){
            $restore = restructure_usrGroup($_POST['row'], true);
            restore_userGroup($restore, $_POST['number']);
        }
        if($_POST["operation"] == "edit"){
            $restore = restructure_blog($_POST['row'], false);
            set_userGroup($restore, $_POST['oldId']);
            $restoreObject = push_usrRowObject($restore);
            echo $restoreObject;
        }
        break;

    case 'Tags':
        if($_POST["operation"] == "delete"){
            $restore = restructure_tag($_POST['row'], true);
            restore_tag($restore, $_POST['number']);
        }
        if($_POST["operation"] == "edit"){
            $restore = restructure_tag($_POST['row'], false);
            set_tag($restore, $_POST['oldId']);
            $restoreObject = push_tagRowObject($restore);
            echo $restoreObject;
        }
        break;

    case 'Newsletter':
        if($_POST["operation"] == "delete"){
            $restore = restructure_newsletter($_POST['row'], true);
            restore_newsletter($restore, $_POST['number']);
        }
        break;

    default : break;
}

?>
