<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Get title, subtitle and background image of a selected page
function get_pageInfo($page){
    $DBpage = selectRecord("blogInfo", "page = '$page' AND backup = '0'");
    $result = $DBpage;

    return $result;
}

// Returns the contents of the Blog DB tables
function get_BlogTable(){
    return selectQuery("blogInfo", "", "id DESC");
}

// Returns a selected blogInfo row
function get_BlogInfo($id){
    $query = selectRecord("blogInfo", "id = $id");
    return $query;
}

// Returns an empty BlogInfo
function get_emptyBlogInfo(){
    $result = array();
    $result['id'] = 0;
    $result['page'] = "Example page";
    $result['title'] = "24CinL";
    $result['subtitle'] = "Developer Team";
    $result['background'] = "exampleImage.jpg";
    $result['backup'] = 0;
    return $result;
}

// Modify an existing BlogInfo row
function set_blogInfo($data, $oldId){
    $query = updateRecord("blogInfo", $data, "id = $oldId");
    return $query;
}

// Delete one or more BlogInfo
function delete_blogInfo($idList, $number){
    if($number == 1){
        deleteRecord("blogInfo", "id = $idList");
    }else{
        for($i = 0; $i < count($idList); $i++){
            $id = $idList[$i];
            deleteRecord("blogInfo", "id = $id");
        }
    }
}

// Insert one or more rows in the BlogInfo table of the DB.
function insert_blogInfo($data, $number){
    $new_data = array();

    if($number == 1){
        $new_data['id'] = $data[0]['id'];
        $new_data['page'] = $data[0]['page'];
        $new_data['title'] = $data[0]['title'];
        $new_data['subtitle'] = $data[0]['subtitle'];
        $new_data['background'] = $data[0]['background'];
        $new_data['backup'] = $data[0]['backup'];
        insertRecord("blogInfo", $new_data);
    }else{
        foreach($data as $data_element){
            $new_data['id'] = $data_element['id'];
            $new_data['page'] = $data_element['page'];
            $new_data['title'] = $data_element['title'];
            $new_data['subtitle'] = $data_element['subtitle'];
            $new_data['background'] = $data_element['background'];
            $new_data['backup'] = $data_element['backup'];
            insertRecord("blogInfo", $new_data);
        }
    }
}

// Checks the correctness of the fields to be inserted in the DB
function check_blogFields($data){
    $id = $data['id'];

    if($id == 0)
        return "Id 0 not allowed!";

    $blog_row = selectRecord("blogInfo", "id = $id");
    if(count($blog_row) > 0)
        return "Id already exist!";

    if($data['backup'] != 0 && $data['backup'] != 1)
        return "Backup value not allowed";
    else
        return $data;
}

//Redefine an array sent by javascript
function restructure_blog($list, $more){
    $result = array();
    if($more){
        for($i = 0; $i < count($list); $i++){
            $result[$i]['id'] = $list[$i][0];
            $result[$i]['page'] = $list[$i][1];
            $result[$i]['title'] = $list[$i][2];
            $result[$i]['subtitle'] = $list[$i][3];
            $result[$i]['background'] = $list[$i][4];
            $result[$i]['backup'] = $list[$i][5];
        }
    }else{
        $result['id'] = $list[0];
        $result['page'] = $list[1];
        $result['title'] = $list[2];
        $result['subtitle'] = $list[3];
        $result['background'] = $list[4];
        $result['backup'] = $list[5];
    }
    return $result;
}

//Returns the header of the DB table BlogInfo
function get_blogTableHeader(){
    $table_head = array();
    $table_head[0] = "Id";
    $table_head[1] = "Page";
    $table_head[3] = "Title";
    $table_head[4] = "Subtitle";
    $table_head[5] = "Background";
    $table_head[6] = "Backup";
    return $table_head;
}

//Set and send an html string which represents the row of the table
function push_BlogInfoRowObject($data){
    $id = $data['id'];
    $page = $data['page'];
    $title = $data['title'];
    $subtitle = $data['subtitle'];
    $background = $data['background'];
    $backup = $data['backup'];

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
                            <input id="email" class="table_td-input" name="table_input-field" value="'.$page.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$title.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$subtitle.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$background.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$backup.'" readonly="readonly"/>
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
