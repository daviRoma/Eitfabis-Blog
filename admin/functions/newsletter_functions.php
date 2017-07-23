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

// Insert one or more rows in the Newsletters table of the DB.
function restore_newsletter($data, $number){
    $new_data = array();

    if($number == 1){
        $new_data['id'] = $data[0]['id'];
        $new_data['title'] = $data[0]['title'];
        $new_data['content'] = $data[0]['content'];
        $new_data['type'] = $data[0]['type'];
        $new_data['frequency'] = $data[0]['frequency'];
        insertRecord(TAB_NEWSLETTERS, $new_data);
    }else{
        foreach($data as $data_element){
            $new_data['id'] = $data_element['id'];
            $new_data['title'] = $data_element['title'];
            $new_data['content'] = $data_element['content'];
            $new_data['type'] = $data_element['type'];
            $new_data['frequency'] = $data_element['frequency'];
            insertRecord(TAB_NEWSLETTERS, $new_data);
        }
    }
}

// Redefine an array sent by javascript
function restructure_newsletter($list, $more){
    $result = array();
    if($more){
        for($i = 0; $i < count($list); $i++){
            $result[$i]['id'] = $list[$i][0];
            $result[$i]['title'] = $list[$i][1];
            $result[$i]['content'] = $list[$i][2];
            $result[$i]['type'] = $list[$i][3];
            $result[$i]['frequency'] = $list[$i][4];
        }
    }else{
        $result['id'] = $list[0];
        $result['title'] = $list[1];
        $result['content'] = $list[2];
        $result['type'] = $list[3];
        $result['frequency'] = $list[4];
    }
    return $result;
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
