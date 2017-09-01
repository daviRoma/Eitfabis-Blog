<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


/* ******************************* SERVICES ******************************* */

// Get all DB services
function get_servicesList($filter){
    if(is_null($filter))
        $services = selectQuery(TAB_SERVICES, "", "label ASC");
    else
        $services = selectQuery(TAB_SERVICES, $filter, "label ASC");

    return $services;
}

// Returns a selected service
function get_service($id){
    $DB_service = selectJoin(TAB_GR_SERV, TAB_SERVICES, "service = id", "id = $id");
    $serv_elem = array(
        "id" => $DB_service[0]['id'],
        "label" => $DB_service[0]['label'],
        "name" => $DB_service[0]['name'],
        "available" => $DB_service[0]['available'],
        "page" => $DB_service[0]['page'],
        "groupId" => array()
    );

    foreach($DB_service as $service){
        $serv_elem['groupId'][] = $service['groupId'];
    }
    return $serv_elem;
}

// Update service
function update_service($id, $new_data){
    updateRecord(TAB_SERVICES, $new_data, "id = $id");
}

// Update group-service relationship
function update_gr_service($id, $new_data){
    deleteRecord(TAB_GR_SERV, "service = $id");
    foreach($new_data as $data){
        insertRecord(TAB_GR_SERV, array("groupId" => $data, "service" => $id));
    }
}

// Delete service and its groups relationships
function delete_service($id){
    deleteRecord(TAB_GR_SERV, "service = $id");
    deleteRecord(TAB_SERVICES, "id = $id");
}


/* ******************************* GROUPS ******************************* */

// Get all group list
function get_groups(){
    $groups = selectQuery(TAB_GROUPS, "", "role ASC");
    return $groups;
}

// Get one group
function get_group($id){
    $DBgroup = selectRecord(TAB_GROUPS, "id = $id");
    return $DBgroup;
}

// Update group
function update_group($id, $new_data){
    updateRecord(TAB_GROUPS, $new_data, "id = $id");
}

// Delete one group and its services relationships
function delete_group($id){
    deleteRecord(TAB_GR_SERV, "groupId = $id");
    deleteRecord(TAB_GROUPS, "id = $id");
}

?>
