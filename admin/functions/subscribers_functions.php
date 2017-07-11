<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Get all DB subscribers elements
function get_subscriberList(){
     return selectQuery("subscribers", "", "id DESC");
}

// Returns a selected subscriber
function get_subscriber($id){
    $query = selectRecord("subscribers", "id = $id");
    return $query;
}

// Returns an empty subscriber
function get_emptySubscriber(){
    $result = array();
    $result['id'] = 0;
    $result['email'] = "example@email.com";
    $result['date'] = date("Y-m-d H:i:s");
    return $result;
}

// Modify an existing subscriber
function set_subscriber($data, $oldId){
    $query = updateRecord("subscribers", $data, "id = $oldId");
    return $query;
}

// Delete one or more subscribers
function delete_subscriber($idList, $number){
    if($number == 1){
        deleteRecord("subscribers", "id = $idList");
    }else{
        for($i = 0; $i < count($idList); $i++){
            $id = $idList[$i];
            deleteRecord("subscribers", "id = $id");
        }
    }
}

// Insert one or more rows in the Subscribers table of the DB.
function insert_subscriber($data, $number){
    $new_data = array();

    if($number == 1){
        $new_data['id'] = $data[0]['id'];
        $new_data['email'] = $data[0]['email'];
        $new_data['date'] = $data[0]['date'];
        insertRecord("subscribers", $new_data);
    }else{
        foreach($data as $data_element){
            $new_data['id'] = $data_element['id'];
            $new_data['email'] = $data_element['email'];
            $new_data['date'] = $data_element['date'];
            insertRecord("subscribers", $new_data);
        }
    }
}

// Checks the correctness of the fields to be inserted in the DB
function check_subFields($data){
    $result = array();
    $id = $data['id'];
    $connection = dbConnect();
    $email = mysqli_real_escape_string($connection, $data['email']);

    if($id == 0)
        return "Id can not be 0!";

    $query_check1 = selectRecord("subscribers", "id = $id");
    $query_check2 = selectRecord('subscribers', "email = '$email'");
    if(count($query_check1) > 0 || count($query_check2) > 0)
        return "Id or email already exist.";

    $result['id'] = $id;
    $result['email'] = $email;
    return $result;
}

// Redefine an array sent by javascript
function restructure_sub($list, $more){
    $result = array();
    if($more){
        for($i = 0; $i < count($list); $i++){
            $result[$i]['id'] = $list[$i][0];
            $result[$i]['email'] = $list[$i][1];
            $result[$i]['date'] = $list[$i][2];
        }
    }else{
        $result['id'] = $list[0];
        $result['email'] = $list[1];
        $result['date'] = $list[2];
    }
    return $result;
}

// Returns the header of the DB table Subscribers
function get_subscribersTableHeader(){
    $table_head = array();
    $table_head[0] = "Id";
    $table_head[1] = "Email";
    $table_head[2] = "Date";
    return $table_head;
}

// Set and send an html string which represents the row of the table
function push_subscribersRowObject($data){
    $id = $data['id'];
    $email = $data['email'];
    $date = $data['date'];

    $resultObject = '<tr class="even pointer" id="data_row" name="data_row" role="row">
                        <td class="a-center " name="table_td-checkbox">
                            <div class="icheckbox_flat-green" style="position: relative;" name="data_check" onClick="selected_checkbox(this)">
                                <input id="row_check" type="checkbox" class="table-checkbox" value="'.$id.'" name="table_records">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0; background-position: initial initial; background-repeat: initial initial;"></ins>
                                <input id="row_index" type="hidden" value="" name="row_index">
                            </div>
                        </td>
                        <td id="id" class=" " name="id" style="width:7%; margin-right:5px;">
                            <input id="id" class="table_td-input" name="table_input-field" value="'.$id.'" readonly="readonly"/>
                        </td>
                        <td id="email" class=" " name="email">
                            <input id="email" class="table_td-input" name="table_input-field" value="'.$email.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$date.'" readonly="readonly"/>
                        </td>
                        <td class="table-operation" name="table_td-operation">
                            <a name="delete_button" href="#" onclick="select_operation(event, '.$id.')">
                                <i id="delete" class="fa fa-trash" title="Delete"></i>
                            </a>
                            <a name="edit_button" href="#" onclick="select_operation(event, '.$id.')" >
                                <i id="edit" class="fa fa-pencil" title="Edit"></i>
                            </a>
                            <a name="load_button" class="op-not-enable" href="#" onclick="select_operation(event, '.$id.')">
                                <i id="load" class="fa fa-play-circle" title="Load"></i>
                            </a>
                        </td>
                    </tr>';
    return $resultObject;
}

?>
