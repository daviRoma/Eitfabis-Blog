<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';
require_once _ROOT . '/admin/functions/categories_functions.php';
require_once _ROOT . '/admin/functions/tags_functions.php';


// Get draft list of the logged user
function get_draftList($username){
    $draftList = selectQuery(TAB_ARTICLES, "author = '$username' AND draft = 1", "date DESC");
    return $draftList;
}


// Get a selected draft to complete
function get_draft($id){
    return selectRecord(TAB_ARTICLES, "id = $id");
}


// Get category of the article (if is set)
function get_articleCategory($id){
    $category = selectJoin(TAB_ART_CAT, TAB_CATEGORIES, "category = id", "article = $id");
    return $category[0];
}


// Get tags of the article (if is set any)
function get_articleTags($id){
    $tags = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "article = $id");
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
        updateRecord(TAB_ARTICLES, $data, "id = $draft_id");
        $result = $draft_id;
    }else{
        $result = insertRecord(TAB_ARTICLES, $data);
    }
    return $result;
}


// Insert or update one reference between one article and one category
function insert_articlesCategory($data, $draft, $draft_id){
    if($draft){
        updateRecord(TAB_ART_CAT, $data, "article = $draft_id");
    }else{
        $result = insertRecord(TAB_ART_CAT, $data);
    }
    return $result;
}


// Insert or update one reference between one article and one or more tags
function insert_articlesTags($data, $draft, $draft_id){
    if($draft){
        updateRecord(TAB_ART_TAG, $data, "article = $draft_id");
    }else{
        $result = insertRecord(TAB_ART_TAG, $data);
    }
    return $result;
}


// delete one draft
function delete_draft($id){
    deleteRecord(TAB_USR_ART, "article = $id");
    deleteRecord(TAB_ART_UPL, "article = $id");
    deleteRecord(TAB_ART_CAT, "article = $id");
    deleteRecord(TAB_ART_TAG, "article = $id");
    deleteRecord(TAB_ARTICLES, "id = $id");
}


/* *************************** TABLE FUNCTIONS ***************************** */

// Returns the contents of the articles-categories DB tables
function get_articlesTable(){
    $result = array();
    $articles = selectQuery(TAB_ARTICLES, "draft = 0", "id DESC");

    $i = 0;
    foreach($articles as $article){
        $id = $article['id'];
        $result[$i]['id'] = $article['id'];
        $result[$i]['title'] = $article['title'];
        $result[$i]['author'] = $article['author'];
        $result[$i]['background'] = $article['background'];
        $category = selectJoin(TAB_ART_CAT, TAB_CATEGORIES, "category = id", "article = $id")[0];
        if($category['name'] != "")
            $result[$i]['category'] = $category['name'];
        else
            $result[$i]['category'] = "No category";
        $i++;
    }
    return $result;
}


// Returns a selected article-category row
function get_articleRow($id){
    $result = array();
    $article = selectRecord(TAB_ARTICLES, "id = $id");
    $article_category = selectJoin(TAB_ART_CAT, TAB_CATEGORIES, "category = id", "article = $id")[0];
    $result['id'] = $article['id'];
    $result['title'] = $article['title'];
    $result['author'] = $article['author'];
    $result['background'] = $article['background'];

    if(isset($article_category['name'])){
        $category_name = $article_category['name'];
        $categories = selectQuery(TAB_CATEGORIES, "name <> '$category_name'", "name ASC");
        foreach($categories as $category) {
            $cat_elem[] = $category['name'];
        }
        array_unshift($cat_elem, $category_name);
    }else{
        $categories = selectQuery(TAB_CATEGORIES, "", "name ASC");
        foreach($categories as $category) {
            $cat_elem[] = $category['name'];
        }
        array_unshift($cat_elem, "No category");
    }
    $result['category'] = $cat_elem;

    return $result;
}


// Modify an existing Article (Only some fields)
function set_article($data, $oldId){
    $data_article = array();
    $data_category = array();
    $category = $data['category'];

    $data_article['id'] = $data['id'];
    $data_article['title'] = $data['title'];
    $data_article['author'] = $data['author'];
    $data_article['background'] = $data['background'];

    $data_category['article'] = $data['id'];
    $data_category['category'] = selectRecord(TAB_CATEGORIES, "name = '$category'")['id'];

    if($data['id'] == $oldId){
        updateRecord(TAB_ART_CAT, $data_category, "article = $oldId");
        updateRecord(TAB_ARTICLES, $data_article, "id = $oldId");
    }else{
        set_articles_relationship($oldId, $data['id'], $data_article, $data_category);
    }
}


// Restore articles relationship of a modified article
function set_articles_relationship($old_article_id, $new_article_id, $new_data, $new_category){
    $user = $new_data['author'];
    $author = selectRecord(TAB_USERS, "username = '$user'")['id'];
    $uploads = selectQuery(TAB_ART_UPL, "article = $old_article_id");
    $tags = selectQuery(TAB_ART_TAG, "article = $old_article_id");

    // Delete relationship
    deleteRecord(TAB_USR_ART, "article = $old_article_id");
    deleteRecord(TAB_ART_CAT, "article = $old_article_id");
    deleteRecord(TAB_ART_UPL, "article = $old_article_id");
    deleteRecord(TAB_ART_TAG, "article = $old_article_id");

    // Update Record
    updateRecord(TAB_ARTICLES, $new_data, "id = $old_article_id");

    // Set relationship
    insertRecord(TAB_USR_ART, array("article" => $new_article_id, "userId" => $author));
    insertRecord(TAB_ART_CAT, $new_category);

    foreach($uploads as $upload){
        insertRecord(TAB_ART_UPL, array("article" => $new_article_id, "upload" => $upload['upload']));
    }
    foreach($tags as $tag){
        insertRecord(TAB_ART_TAG, array("article" => $new_article_id, "tag" => $tag['tag']));
    }
}


// Delete one or more articles
function delete_article($idList, $number){
    if($number == 1){
        $background = selectRecord(TAB_ARTICLES, "id = $idList")['background'];
        // Delete all uploads linked to the article
        unlink(_ROOT . "/" . $background);
        $uploads = selectJoin(TAB_ART_UPL, TAB_UPLOADS, "upload = id", "article = $idList");
        foreach($uploads as $upload){
            unlink(_ROOT . "/" . $upload['file_address'] . $upload['file_name']);
        }
        deleteRecord(TAB_ART_UPL, "article = $idList");
        deleteRecord(TAB_USR_ART, "article = $idList");
        deleteRecord(TAB_ART_CAT, "article = $idList");
        deleteRecord(TAB_ART_TAG, "article = $idList");
        deleteRecord(TAB_COMMENTS, "article = $idList");
        deleteRecord(TAB_ARTICLES, "id = $idList");
    }else{
        for($i = 0; $i < count($idList); $i++){
            $id = $idList[$i];
            $background = selectRecord(TAB_ARTICLES, "id = $id")['background'];
            // Delete all uploads linked to the article
            unlink(_ROOT . "/" . $background);
            $uploads = selectJoin(TAB_ART_UPL, TAB_UPLOADS, "upload = id", "article = $id");
            foreach($uploads as $upload){
                unlink(_ROOT . "/" . $upload['file_address'] . $upload['file_name']);
            }
            deleteRecord(TAB_ART_UPL, "article = $id");
            deleteRecord(TAB_USR_ART, "article = $id");
            deleteRecord(TAB_ART_CAT, "article = $id");
            deleteRecord(TAB_ART_TAG, "article = $id");
            deleteRecord(TAB_COMMENTS, "article = $id");
            deleteRecord(TAB_ARTICLES, "id = $id");
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
function check_articleRow($data, $oldId){
    $error = "";
    $flag_1 = false;
    $flag_2 = false;
    $categories = selectQuery(TAB_CATEGORIES, "", "name ASC");
    $users = selectQuery(TAB_USERS, "", "id ASC");

    if($data['id'] != $oldId){
        if($data['id'] == 0){
            $error = "Id cannot be 0!";
            return $error;
        }else{
            $id = $data['id'];
            $articles = selectRecord(TAB_ARTICLES, "id = $id");
            if(count($articles) > 0){
                $error = "Id already exist!";
                return $error;
            }
        }
    }
    return $data;
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
