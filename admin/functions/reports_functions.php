<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Retrieve a report list from DB
function retrieve_all_reports(){
    $query = selectQuery("reports", "", "date DESC");

    $i = 0;
    while($i < count($query)){
        $new_date = date_format_uni($query[$i]['date'], false);
        if(strlen($query[$i]['message']) > 100)
            $message_preview = substr($query[$i]['message'], 0, 84) . "...";
        else
            $message_preview = $query[$i]['message'];

        $result[$i]['id'] = $query[$i]['id'];
        $result[$i]['name'] = $query[$i]['name'];
        $result[$i]['message_preview'] = $message_preview;
        $result[$i]['date'] = $new_date;
        $result[$i]['flag'] = $query[$i]['flag'];
        $i++;
    }
    return $result;
}

// Retrieve a specific report
function retrieve_firstReport(){
    $query = selectQuery("reports", "", "date DESC");

    $result['id'] = $query[0]['id'];
    $result['name'] = $query[0]['name'];
    $result['email'] = $query[0]['email'];
    $result['message'] = $query[0]['message'];
    $result['date'] = $query[0]['date'];
    $result['flag'] = $query[0]['flag'];
    $new_date = date_format_uni($result['date'], true);
    $result['date'] = $new_date;

    return $result;
}

// Return specific report selected
function get_report($id){
    $report = selectRecord("reports", "id = $id");
    $report['date'] = date_format_uni($report['date'], true);
    return $report;
}

// Archive-Unarchive report
function set_archive($id, $archive){
    $data = array();
    if($archive)
        $data['flag'] = 1;
    else
        $data['flag'] = 0;
    updateRecord("reports", $data, "id = $id");
}

// Delete a specific report
function delete_report($id){
    deleteRecord("reports", "id = $id");
}

// Delete all report archived
function delete_archived(){
    $reports = selectQuery("reports", "", "id DESC");
    $count = 0;

    foreach($reports as $report){
        if($report['flag'] == 1){
            $id = $report['id'];
            deleteRecord("reports", "id = $id");
            $count++;
        }
    }
    return $count;
}

?>
