<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/functions/utility_functions.php';
require_once _ROOT . '/admin/functions/db_functions.php';


$file_name = strtolower($_POST['fileName']);
$uploads = selectQuery(TAB_UPLOADS, "gallery = 0", "");

foreach($uploads as $upload){
    if(stristr($upload['file_name'],$file_name)){
        $uploadId = $upload['id'];
        deleteRecord(TAB_UPLOADS, "id = $uploadId");    // Remove file from DB
        unlink(_ROOT . "/" . $upload['file_address'] . $upload['file_name']);   // Remove file from server
    }
}

?>
