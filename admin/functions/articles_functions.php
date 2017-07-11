<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';
require_once _ROOT . '/admin/functions/categories_functions.php';
require_once _ROOT . '/admin/functions/tags_functions.php';


// Get draft list of the logged user
function get_draftList($username){
    $draftList = selectQuery("articles", "author = '$username' AND draft = 1", "date DESC");
    return $draftList;
}


// Get a selected draft to complete
function get_draft($id){
    return selectRecord("articles", "id = $id");
}


// Get category of the article (if is set)
function get_articleCategory($id){
    return selectRecord("part_of", "article = $id");
}


// Get tags of the article (if is set any)
function get_articleTags($id){
    $tags = selectJoin("has", "tag", "tag = id", "article = $id");
    $data = array();
    foreach($tags as $tag){
        $data[] = $tag['label'];
    }
    return $data;
}


// Insert or update one article
function insert_article($data, $draft, $draft_id){
    if($draft){
        $data['draft'] = 0;
        updateRecord("articles", $data, "id = $draft_id");
        $result = $draft_id;
    }else{
        $result = insertRecord("articles", $data);
    }
    return $result;
}


// Insert or update one reference between one article and one category
function insert_articlesCategory($data, $draft, $draft_id){
    if($draft){
        updateRecord("part_of", $data, "article = $draft_id");
    }else{
        $result = insertRecord("part_of", $data);
    }
    return $result;
}


// Insert or update one reference between one article and one or more tags
function insert_articlesTags($data, $draft, $draft_id){
    if($draft){
        updateRecord("has", $data, "article = $draft_id");
    }else{
        $result = insertRecord("has", $data);
    }
    return $result;
}


// delete one draft
function delete_draft($id){
    deleteRecord("part_of", "article = $id");
    deleteRecord("has", "article = $id");
    deleteRecord("articles", "id = $id");
}


/* *************************** TABLE FUNCTIONS ***************************** */

// Returns the contents of the articles-categories DB tables
function get_articlesTable(){
    $result = array();
    $articles = selectQuery("articles", "", "id DESC");
    $categories = selectQuery("part_of", "", "category DESC");
    $i = 0;
    foreach ($articles as $article) {
        foreach ($categories as $category) {
            if($article['id'] == $category['article']){
                $result[$i]['id'] = $article['id'];
                $result[$i]['title'] = $article['title'];
                $result[$i]['author'] = $article['author'];
                $result[$i]['background'] = $article['background'];
                $result[$i]['category'] = $category['category'];
                $i++;
                break;
            }
        }
    }
    return $result;
}


// Returns a selected article-category row
function get_articleRow($id){
    $result = array();
    $article = selectRecord("articles", "id = $id");
    $category = selectRecord("part_of", "article = $id");
    $result['id'] = $article['id'];
    $result['title'] = $article['title'];
    $result['author'] = $article['author'];
    $result['background'] = $article['background'];
    $result['category'] = $category['category'];
    return $result;
}


// Modify an existing Article (Only some fields)
function set_article($data, $oldId){
    $data_article = array();
    $data_category = array();
    $data_article['id'] = $data['id'];
    $data_article['title'] = $data['title'];
    $data_article['author'] = $data['author'];
    $data_article['background'] = $data['background'];
    $data_category['article'] = $data['id'];
    $data_category['category'] = $data['category'];
    deleteRecord("part_of", "article = $oldId");
    updateRecord("articles", $data_article, "id = $oldId");
    insertRecord("part_of", $data_category);
}


// Delete one or more articles
function delete_article($idList, $number){
    if($number == 1){
        $background = selectRecord("articles", "id = $idList")['background'];
        deleteRecord("part_of", "article = $idList");
        deleteRecord("has", "article = $idList");
        deleteRecord("articles", "userId = $idList");
        // Delete all uploads linked to the article
        unlink(_ROOT . "/" . $background);
        $uploads = selectQuery("upload", "article = $idList");
        foreach($uploads as $upload){
            unlink(_ROOT . "/" . $upload['file_address'] . $upload['file_name']);
        }
        deleteRecord("upload", "article = $idList");
    }else{
        for($i = 0; $i < count($idList); $i++){
            $id = $idList[$i];
            $background = selectRecord("articles", "id = $id")['background'];
            deleteRecord("part_of", "article = $id");
            deleteRecord("has", "article = $id");
            deleteRecord("articles", "userId = $id");
            // Delete all uploads linked to the article
            unlink(_ROOT . "/" . $background);
            $uploads = selectQuery("upload", "article = $id");
            foreach($uploads as $upload){
                unlink(_ROOT . "/" . $upload['file_address'] . $upload['file_name']);
            }
            deleteRecord("upload", "article = $id");
        }
    }
}


// Redefine an array sent by javascript
function restructure_articleRow($list, $more){
    $result = array();
    if($more){
        for($i = 0; $i < count($list); $i++){
            $result[$i]['id'] = $list[$i][0];
            $result[$i]['title'] = $list[$i][1];
            $result[$i]['author'] = $list[$i][2];
            $result[$i]['background'] = $list[$i][3];
            $result[$i]['category'] = $list[$i][4];
        }
    }else{
        $result['id'] = $list[0];
        $result['title'] = $list[1];
        $result['author'] = $list[2];
        $result['background'] = $list[3];
        $result['category'] = $list[4];
    }
    return $result;
}


// Returns the header of the DB table Article-Category
function get_articleTableHeader(){
    $table_head = array();
    $table_head[0] = "Id";
    $table_head[1] = "Title";
    $table_head[2] = "Author";
    $table_head[3] = "Background";
    $table_head[4] = "Category";
    return $table_head;
}


// Check the correctness of the data that we want to insered
function check_articleRow($data){
    $error = "";
    $flag_1 = false;
    $flag_2 = false;
    $categories = selectQuery("categories", "", "name ASC");
    $users = selectQuery("users", "", "id ASC");

    if($data['id'] == 0){
        $error = "Id cannot be 0!";
        return $error;
    }

    foreach($users as $user){
        if($user['username'] == $data['author']){
            $flag_1 = true;
            break;
        }
    }

    foreach($categories as $category){
        if($category['name'] == $data['category']){
            $flag_2 = true;
            break;
        }
    }

    if($flag_1 && $flag_2){
        return $data;
    }else{
        $error = "Invalid author or category.";
        return $error;
    }

}


// Set and send an html string which represents the row of the table
function push_articleRowObject($data){
    $id = $data['id'];
    $title = $data['title'];
    $author = $data['author'];
    $background = $data['background'];
    $category = $data['category'];

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
                            <input id="email" class="table_td-input" name="table_input-field" value="'.$title.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$author.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$background.'" readonly="readonly"/>
                        </td>
                        <td id="date" class=" " name="date">
                            <input id="date" class="table_td-input" name="table_input-field" value="'.$category.'" readonly="readonly"/>
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
