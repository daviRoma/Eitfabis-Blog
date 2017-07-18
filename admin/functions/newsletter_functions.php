<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';



// Get all newsletters
function get_newsletterList(){
     $newsletters = selectQuery(TAB_NEWSLETTERS, "", "id DESC");
     for($i = 0; $i < count($newsletters); $i++){
         $newsletters[$i]['content'] = substr($newsletters[$i]['content'], 0, 35) . "..";
     }
     return $newsletters;
}

// Get a selected newsletter
function get_newsletter($id){
    $query = selectRecord(TAB_NEWSLETTERS, "id = $id");
    return $query;
}

// Delete one or more newsletters
function delete_newsletter($idList, $number){
    if($number == 1){
        deleteRecord(TAB_NEWSLETTERS, "id = $idList");
    }else{
        for($i = 0; $i < count($idList); $i++){
            $id = $idList[$i];
            deleteRecord(TAB_NEWSLETTERS, "id = $id");
        }
    }
}

// Insert newsletter in the DB
function insert_newsletter($title, $type, $frequency, $content){
    $data = array();

    $data['title'] = $title;
    $data['type'] = $type;
    $data['frequency'] = $frequency;
    $data['content'] = $content;

    if(insertRecord(TAB_NEWSLETTERS, $data))
        return true;
    else
        return false;
}


// Returns the header of the DB table Newsletters
function get_newsletterTableHeader(){
    $table_head = array();
    $table_head[0] = "Id";
    $table_head[1] = "Title";
    $table_head[2] = "Content";
    $table_head[3] = "Type";
    $table_head[4] = "Frequency";
    return $table_head;
}
?>
