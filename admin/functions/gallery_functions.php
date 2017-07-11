<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Get all DB table elements
function get_uploadList(){
     $list = selectQuery("upload", "", "id DESC");
     $result = array();
     $i = 0;
     while($i < count($list)){
         $result[$i]['id'] = $list[$i]['id'];
         $result[$i]['file_name'] = $list[$i]['file_name'];
         $result[$i]['folder'] = $list[$i]['folder'];
         $result[$i]['file_address'] = $list[$i]['file_address'];
         $result[$i]['gallery'] = $list[$i]['gallery'];
         $result[$i]['name'] = $list[$i]['name'];
         $result[$i]['description'] = $list[$i]['description'];
         $i++;
     }
     return $result;
}

// Returns a selected upload row
function get_upload($id){
    $query = selectRecord("upload", "id = $id");
    $result = array();

    $result['id'] = $query['id'];
    $result['file_name'] = $query['file_name'];
    $result['folder'] = $query['folder'];
    $result['file_address'] = $query['file_address'];
    $result['gallery'] = $query['gallery'];
    $result['name'] = $query['name'];
    $result['description'] = $query['description'];
    return $result;
}

// Modify an existing upload
function set_upload($data, $oldId){
    $new_path = _ROOT . "/" . $data['file_address'] . $data['file_name'];
    $oldData = selectRecord("upload", "id = $oldId");
    $old_path = _ROOT . "/" . $oldData['file_address'] . $oldData['file_name'];

    if($new_path == $old_path){
        updateRecord("upload", $data, "id = $oldId");
    }else{
        $ext = explode(".", $data['file_name']);
        $data['file_extension'] = $ext[count($ext)-1];
        copy($old_path, $new_path);
        unlink($old_path);
        updateRecord("upload", $data, "id = $oldId");
    }
}

// Delete one or more upload
function delete_upload($idList, $number){
    if($number == 1){
        $picture = selectRecord("upload", "id = $idList");
        deleteRecord("upload", "id = $idList");
        unlink(_ROOT . "/" . $picture['file_address'] . $picture['file_name']);
    }else{
        for($i = 0; $i < count($idList); $i++){
            $id = $idList[$i];
            $picture = selectRecord("upload", "id = $id");
            deleteRecord("upload", "id = $id");
            unlink(_ROOT . "/" . $picture['file_address'] . $picture['file_name']);
        }
    }
}

// Checks the correctness of the fields to be inserted in the DB
function check_uploadFields($data, $check){
    $error = "";
    $flag = false;
    $path_array = get_path_array();

    if($data['id'] == 0){
        $error = "Id cannot be 0!";
        return $error;
    }

    if(count($data['name']) > 128 || count($data['description']) > 255){
        $error = "Name and Description fieds must be at most 128 and 255 characters length respectively.";
        return $error;
    }

    if($data['file_extension'] != "jpg" || $data['file_extension'] != "png" || $data['file_extension'] != "jpeg"){
        $error = "Invalid file extension";
        return $error;
    }

    if($data['gallery'] != 0 && $data['gallery'] != 1){
        $error = "Invalid value for gallery column.";
        return $error;
    }

    for($i = 0; $i < count($path_array); $i++){
        if($data['file_address'] == $path_array)
            $flag = true;
    }

    if($flag){
        $id = $data['id'];
        $file_name = $data['file_name'];
        $check = selectQuery("upload", "id = $id OR file_name = $file_name", "");
        if(count($check) > 0){
            $error = "Row already exist!";
            return $error;
        }
    }else{
        $error = "Invalid file address attribute.";
        return $error;
    }
    return $data;
}

// Redefine an array sent by javascript
function restructure_upload($list, $more){
    $result = array();
    if($more){
        for($i = 0; $i < count($list); $i++){
            $result[$i]['id'] = $list[$i][0];
            $result[$i]['file_name'] = $list[$i][1];
            $result[$i]['folder'] = $list[$i][2];
            $result[$i]['file_address'] = $list[$i][3];
            $result[$i]['gallery'] = $list[$i][4];
            $result[$i]['name'] = $list[$i][5];
            $result[$i]['description'] = $list[$i][6];
        }
    }else{
        $result['id'] = $list[0];
        $result['file_name'] = $list[1];
        $result['folder'] = $list[2];
        $result['file_address'] = $list[3];
        $result['gallery'] = $list[4];
        $result['name'] = $list[5];
        $result['description'] = $list[6];
    }
    return $result;
}

//Returns the header of the DB table Upload
function get_uploadTableHeader(){
    $table_head = array();
    $table_head[0] = "Id";
    $table_head[1] = "File_Name";
    $table_head[2] = "Folder";
    $table_head[3] = "Address";
    $table_head[4] = "Gallery";
    $table_head[5] = "Name";
    $table_head[6] = "Description";
    return $table_head;
}

//Set and send an html string which represents the row of the table
function push_uploadRowObject($data){
    $id = $data['id'];
    $file_name = $data['file_name'];
    $folder = $data['folder'];
    $address = $data['file_address'];
    $gallery = $data['gallery'];
    $name = $data['name'];
    $description = $data['description'];

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
                            <input id="email" class="table_td-input" name="table_input-field" value="'.$file_name.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$folder.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$address.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$gallery.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$name.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$description.'" readonly="readonly"/>
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
