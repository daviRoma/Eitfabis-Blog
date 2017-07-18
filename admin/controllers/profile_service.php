<?php

require_once '../configs/admin_configs.php';
require_once _ROOT . '/admin/controllers/session.php';
require_once _ROOT . '/admin/functions/profile_functions.php';
require_once _ROOT . '/admin/functions/service_setup.php';


// Check the privilegies of the logged user before proceeding
check_service("profile_service.php", $_SESSION['role'], 1);


if(isset($_POST['profileSubmit'])){
    $error = "";
    $flag = false;

    // Check empty fields
	if(empty($_POST['setCountry']) || empty($_POST['setEmployment']) || empty($_POST['setEmail'])){
        $error = "All fields are mandatory!";
        redirect("../profile.php?error=$error", true);
    }
    // Check email format
    if(!filter_var($_POST['setEmail'], FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address";
        redirect("../profile.php?error=$error");
    }

    // Run DB operations
    $country = ucfirst($_POST['setCountry']);
    $employment = ucfirst($_POST['setEmployment']);
    $email = $_POST['setEmail'];
    $brief_description = $_POST['setBriefDescription'];
    $links = "";

    for($i = 0; $i < 4; $i++){
        if($_POST["setLink_".$i] != "")
            $links .=  $_POST["setLink_".$i] . "[]";
    }
    $id = $_SESSION['userId'];
    $user = get_user($id);


    // Insert personal info
    $data_1 = array();
    $data_1['country'] = $country;
    $data_1['employment'] = $employment;
    $data_1['brief_description'] = $brief_description;
    $data_1['link'] = $links;
    updateRecord(TAB_PERSONALINFO, $data_1, "user = $id");


    // Insert user email (if it was changed)
    if($user['email'] != $email){
        $data_2 = array();
        $data_2['email'] = $email;
        updateRecord(TAB_USERS, $data_2, "id = $id");
    }

    redirect("../profile.php", true);
}else{
    redirect("../error_page.php?typeError=500&message=Cannot perform the requested operation. Data was not sent.");
}

?>
