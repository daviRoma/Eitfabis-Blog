<?php

require_once '../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("addServiceGroup_service.php", $_SESSION['role'], 1);
$error = "";


if(isset($_POST['addNewService']) || isset($_POST['addNewGroup'])){

    // Add Service
    if(isset($_POST['addNewService'])){
        $required = array('set_s_label', 'set_s_name', 'groups');

	    if(emptycheck($required)){
            $error = 'Required fields: ' . emptycheck($required);
            redirect("../group_service.php?error=$error", true);
        }

        $data = array();
        $data['label'] = $_POST['set_s_label'];
        $data['name'] = $_POST['set_s_name'];

        if(isset($_POST['main_service']))
            $data['page'] = 1;

        if(isset($_POST['available_service']))
            $data['available'] = 1;

        $service_id = insertRecord(TAB_SERVICES, $data);

        foreach($_POST['groups'] as $group_id){
            insertRecord(TAB_GR_SERV, array('groupId' => $group_id, 'service' => $service_id));
        }
        redirect("../group_service.php", true);

    }else{
        // Add Group
        $required = array('set_g_name', 'set_g_desc');

    	if(emptycheck($required)) {
    		$error = 'Required fields: ' . emptycheck($required);
        	redirect("../group_service.php?error=$error", true);
        }

        $data = array();
        $data['role'] = $_POST['set_g_name'];
        $data['description'] = $_POST['set_g_desc'];
        $data['start'] = $_POST['set_g_start'];

        insertRecord(TAB_GROUPS, $data);

        redirect("../group_service.php", true);
    }

}else{
    $error = "Cannot perform the requested operation. Data was not sent.";
    redirect("../error_page.php?typeError=500&message=$error");
}
?>
