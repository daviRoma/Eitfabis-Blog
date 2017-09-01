<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/configs/smarty_setup.php';
require_once _ROOT . '/admin/functions/set_of_functions.php';

$smarty = new Admin_Item();

switch ($_POST['position']) {
    case 'Article Management':
        if($_POST['operation'] == "edit"){
            $edit = $_POST['row'];
            $head = get_articleTableHeader();
            $article = get_articleRow($edit[0]);
            $smarty->assign('table_head', $head);
            $smarty->assign('row', $article);
            $smarty->assign('operation', "edit");
        }
        // Add operation not allowed
        break;

    case 'Files Manager':
            if($_POST['operation'] == "edit"){
                $edit = $_POST['row'];
                $head = get_uploadTableHeader();
                $upload = get_upload($edit[0]);
                $smarty->assign('table_head', $head);
                $smarty->assign('row', $upload);
                $smarty->assign('operation', "edit");
            }
            // Add operation not allowed
            break;

    case 'Subscribers':
        if($_POST['operation'] == "edit"){
            $edit = $_POST['row'];
            $head = get_subscribersTableHeader();
            $subscriber = get_subscriber($edit[0]);
            $smarty->assign('table_head', $head);
            $smarty->assign('row', $subscriber);
            $smarty->assign('operation', "edit");
        }
        if($_POST['operation'] == "add"){
            $subscriber = get_emptySubscriber();
            $head = get_subscribersTableHeader();
            $smarty->assign('table_head', $head);
            $smarty->assign('row', $subscriber);
            $smarty->assign('operation', "add");
        }
        break;

    case 'Blog':
        if($_POST['operation'] == "edit"){
            $edit = $_POST['row'];
            $head = get_blogTableHeader();
            $infos = get_blogInfo($edit[0]);
            $smarty->assign('table_head', $head);
            $smarty->assign('row', $infos);
            $smarty->assign('operation', "edit");
        }
        if($_POST['operation'] == "add"){
            $infos = get_emptyBlogInfo();
            $head = get_blogTableHeader();
            $smarty->assign('table_head', $head);
            $smarty->assign('row', $infos);
            $smarty->assign('operation', "add");
        }
        break;

    case 'Users':
        if($_POST['operation'] == "edit"){
            $edit = $_POST['row'];
            if(is_admin($edit[0])){
                echo "STOP";
                exit;
            }else{
                $head = get_userTableHeader();
                $users = get_userGroup($edit[0]);
                $smarty->assign('table_head', $head);
                $smarty->assign('row', $users);
                $smarty->assign('operation', "edit");
            }
        }
        if($_POST['operation'] == "add"){
            $head = get_userTableHeader();
            $emptyUser = get_emptyUserGroup();
            $smarty->assign('table_head', $head);
            $smarty->assign('row', $emptyUser);
            $smarty->assign('operation', "add");
        }
        break;

    case 'Tags':
        if($_POST['operation'] == "edit"){
            $edit = $_POST['row'];
            $head = get_tagTableHeader();
            $tag = get_tagById($edit[0]);
            $smarty->assign('table_head', $head);
            $smarty->assign('row', $tag);
            $smarty->assign('operation', "edit");
        }
        if($_POST['operation'] == "add"){
            $tag = get_emptyTag();
            $head = get_tagTableHeader();
            $smarty->assign('table_head', $head);
            $smarty->assign('row', $tag);
            $smarty->assign('operation', "add");
        }
        break;

    default : break;
}

$smarty->display(EDIT_MODAL);

?>
