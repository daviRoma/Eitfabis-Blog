<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Get all service with the correspondent group
function get_services(){
    $services = selectJoin("group_service", "services", "service = id", "");
    return $services;
}


// Get all services about one group
function get_groupService($group){
    $group_service = selectJoin("group_service", "services", "service = id", "groupId = $group");
    return $group_service;
}


// Check the privilegies
function check_service($page, $group, $level){
    $services = get_groupService($group);
    foreach ($services as $service) {
        if($service['name'] == $page)
            return true;
    }
    if($level > 0)
        redirect("../error_page.php?typeError=403&message=Please respect the services assigned at your own group.", true);
    else
        redirect("error_page.php?typeError=403&message=Please respect the services assigned at your own group.", true);
}


// Go to the starter page of the current logged user
function go_to_start($group){
    switch($group){
        case 1: redirect("../index.php", true); break;
        case 2: redirect("../reports.php", true); break;
        case 3: redirect("../blog.php", true); break;
        case 4: redirect("../standard.php", true); break;
        default: break;
    }
}

?>
