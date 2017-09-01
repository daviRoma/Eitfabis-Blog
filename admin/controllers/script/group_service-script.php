<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/groups_and_services_functions.php';


if(isset($_GET['grserv'])){
    // Show group data
    if($_GET['grserv'] == 'group'){
        $strJSon = "";
        $group = get_group($_GET['id']);
        $strJSon = json_encode($group);
    }

    // Show service data
    if($_GET['grserv'] == 'service'){
        $strJSon = "";
        $service = get_service($_GET['id']);
        $strJSon = json_encode($service);
    }
    unset($_GET);
    echo $strJSon;
}

if(isset($_POST['operation'])){
    if($_POST['operation']){    // Edit
        if($_POST['grserv'] == 'group'){
            $id = $_POST['new_data'][0];
            $new_group = array("role" => $_POST['new_data'][1], "description" => $_POST['new_data'][2]);
            update_group($id, $new_group);
        }
        if($_POST['grserv'] == 'service'){
            $id = $_POST['new_data'][0];
            $new_service = array(
                "label" => $_POST['new_data'][1],
                "name" => $_POST['new_data'][2],
                "page" => $_POST['new_data'][3],
                "available" => $_POST['new_data'][4]
            );
            update_service($id, $new_service);
            update_gr_service($id, $_POST['new_data'][5]);
        }
    }else{      // Delete
        if($_POST['grserv'] == 'group'){
            delete_group($_POST['id']);
        }
        if($_POST['grserv'] == 'service'){
            delete_service($_POST['id']);
        }
    }
}

?>
