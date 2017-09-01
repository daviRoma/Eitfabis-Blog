<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/profile_functions.php';


switch($_POST['key']) {
    case 'changePwd':
        $old_pwd = md5($_POST['old_pwd']);
        $new_pwd = $_POST['new_pwd'];
        $usr_id = $_SESSION['userId'];
        $DB_old_pwd = selectRecord(TAB_USERS, "id = $usr_id")['password'];
        if($old_pwd == $DB_old_pwd){
            update_pwd($id, $new_pwd);
            echo "New password updated!";
        }else{
            echo "Old passwords not match!";
        }
        break;

    default: break;
}


?>
