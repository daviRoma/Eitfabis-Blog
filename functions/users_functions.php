<?php

require_once BLOG_ROOT . '/functions/db_functions.php';
require_once BLOG_ROOT . '/functions/utility_functions.php';


// Retrieve users list infos
function retrieve_user_info(){
    $error = "";
    $result = array();

    //recovery information users
    $DBinfos = selectQuery("personal_info", "", "userId ASC");

    if(count($DBinfos) < 0){
        $error = "Error! Out of service, please try later";
        return $error;
    }

    foreach($DBinfos as $info){
        $list_element = array();

        $list_element['id'] = $info['id'];
        $list_element['username'] = retrieve_username($info['id']);
        $list_element['user_img'] = $info['img_address'];
        $list_element['employment'] = $info['employment'];
        $list_element['brief_description'] = $info['brief_description'];
        $list_element['country'] = $info['country'];
        if(isset($info['link']))
            $list_element['links'] = get_links($info['link']);

        $result[] = $list_element;
    }

    return $result;
}


// Retrieve username of any given id
function retrieve_username($id){

    $query = selectRecord("users", "id = '$id'");
    if(count($query) > 0)
        $username = $query['username'];

    return $username;
}


// Get user links
function get_links($links){

    $string = substr($links, 0, strlen($links) - 2);
    $elements = explode("[]", $string);

    return $elements;
}


// Make a users array to display
function assign_users($users){
    foreach($users as $user){
    	$list_element = array();

    	$list_element['user_img'] = $user['user_img'];
    	$list_element['username'] = $user['username'];
    	$list_element['employment'] = $user['employment'];
    	$list_element['brief_description'] = $user['brief_description'];
    	$list_element['country'] = $user['country'];

    	if(isset($user['links']))
    		$list_element['links'] = $user['links'];

    	$list[] = $list_element;
    }
    return $list;
}

?>
