<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Get all DB table elements
function get_tagList(){
    $DBtags = selectQuery(TAB_TAGS, "", "id DESC");
    $tags = array();
    foreach($DBtags as $tag){
        $id = $tag['id'];

        $tag_elem = array();
        $tag_elem['id'] = $id;
        $tag_elem['label'] = $tag['label'];
        $tag_elem['description'] = $tag['description'];
        $categories = selectJoin(TAB_TAG_CAT, TAB_CATEGORIES, "category = id", "tag = $id");
        if(count($categories) > 1){
            $tag_elem['categories'] = "More";
        }else{
            $tag_elem['categories'] = $categories[0]['name'];
        }
        $tags[] = $tag_elem;
    }
    return $tags;
}

// Get a selected tags by id
function get_tagById($id){
    $DBtag = selectRecord(TAB_TAGS, "id = $id");
    $tag = array();
    $tag['id'] = $DBtag['id'];
    $tag['label'] = $DBtag['label'];
    $tag['description'] = $DBtag['description'];
    $tag['categories'] = "";
    $categories = selectJoin(TAB_TAG_CAT, TAB_CATEGORIES, "category = id", "tag = $id");
    foreach($categories as $category) {
        $tag['categories'] .= $category['name'] . ";";
    }
    return $tag;
}

// Get a selected tags by label
function get_tagByLabel($label){
    $query = selectRecord(TAB_TAGS, "label = '$label'");
    return $query;
}

// Get tags by category
function get_tagsByCategory($category_id){
    $query = selectJoin(TAB_TAG_CAT, TAB_TAGS, "tag = id", "category = $category_id");
    return $query;
}

// Modify an existing tag
function set_tag($data, $oldId){
    $categories = explode(";", $data['categories']);
    deleteRecord(TAB_TAG_CAT, "tag = $oldId");

    $DBcategories = selectQuery(TAB_CATEGORIES, "", "name ASC");
    foreach($categories as $category){
        foreach($DBcategories as $DBcategory){
            if(stristr($DBcategory['name'], $category)){
                insertRecord(TAB_TAG_CAT, array("tag" => $data['id'], "category" => $DBcategory['id']));
                break;
            }
        }
    }

    $query = updateRecord(TAB_TAGS, array("label" => $data['label'], "description" => $data['description']), "id = $oldId");
    return $query;
}

//Delete one or more tags
function delete_tag($idList, $number){
    if($number == 1){
        deleteRecord(TAB_TAG_CAT, "tag = $idList");
        deleteRecord(TAB_ART_TAG, "tag = $idList");
        deleteRecord(TAB_TAGS, "id = $idList");
    }else{
        for($i = 0; $i < count($idList); $i++){
            $id = $idList[$i];
            deleteRecord(TAB_TAG_CAT, "tag = $id");
            deleteRecord(TAB_ART_TAG, "tag = $id");
            deleteRecord(TAB_TAGS, "id = $id");
        }
    }
}

// Insert one row in the Tag table of the DB
function insert_tag($data){
    $tagId = insertRecord(TAB_TAGS, $data);
    return $tagId;
}

// Restore one or more rows in the Tag table of the DB.
function restore_tag($data, $number){
    $new_data = array();

    if($number == 1){
        $new_data['id'] = $data[0]['id'];
        $new_data['label'] = $data[0]['label'];
        $new_data['description'] = $data[0]['description'];
        insertRecord(TAB_TAGS, $new_data);
    }else{
        foreach($data as $data_element){
            $new_data['id'] = $data_element['id'];
            $new_data['label'] = $data_element['label'];
            $new_data['description'] = $data_element['description'];
            insertRecord(TAB_TAGS, $new_data);
        }
    }
}

// Redefine an array sent by javascript
function restructure_tag($list, $more){
    $result = array();
    if($more){
        for($i = 0; $i < count($list); $i++){
            $result[$i]['id'] = $list[$i][0];
            $result[$i]['label'] = $list[$i][1];
            $result[$i]['description'] = $list[$i][2];
            $result[$i]['categories'] = $list[$i][3];
        }
    }else{
        $result['id'] = $list[0];
        $result['label'] = $list[1];
        $result['description'] = $list[2];
        $result['categories'] = $list[3];
    }
    return $result;
}

// Get the header of the DB table Tag
function get_tagTableHeader(){
    $table_head = array();
    $table_head[0] = "Id";
    $table_head[1] = "Label";
    $table_head[2] = "Description";
    $table_head[3] = "Categories";
    return $table_head;
}

// Check tag fields to be insered
function check_tagFields($data){
    $flag = false;
    if(empty($data['id']) || empty($data['label']) || empty($data["description"] || empty($data['categories'])))
        return "Empty field not allowed";

    $categories = explode(";", $data['categories']);
    $DBcategories = selectQuery(TAB_CATEGORIES, "", "name ASC");
    foreach($categories as $category){
        $flag = false;
        foreach($DBcategories as $DBcategory){
            if(stristr($DBcategory['name'], $category)){
                $flag = true;
                break;
            }
        }
    }
    if(!$flag)
        return "No match found for categories";

    return $data;
}

//Set and send an html string which represents the row of the table
function push_tagRowObject($data){
    $id = $data['id'];
    $label = $data['label'];
    $description = $data['description'];

    $DBcategories = selectJoin(TAB_TAG_CAT, TAB_CATEGORIES, "category = id", "tag = $id");
    if(count($DBcategories) > 1){
        $categories = "More";
    }else{
        $categories = $DBcategories[0]['name'];
    }

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
                        <td id="label" class=" " name="label">
                            <input id="label" class="table_td-input" name="table_input-field" value="'.$label.'" readonly="readonly"/>
                        </td>
                        <td id="description" class=" " name="description">
                            <input id="description" class="table_td-input" name="table_input-field" value="'.$description.'" readonly="readonly"/>
                        </td>
                        <td id="categories" class=" " name="categories">
                            <input id="categories" class="table_td-input" name="table_input-field" value="'.$categories.'" readonly="readonly"/>
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
