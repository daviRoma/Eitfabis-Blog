<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/functions/newsletter_functions.php';


if($_POST['operation'] == "insert"){
    $operation = insert_newsletter($_POST['title'], $_POST['type'], $_POST['frequency'], $_POST['content']);

    if($operation){
        echo "Newsletter insered";
    }else{
        echo "Error insert newsletter";
    }
}


if($_POST['operation'] == "send"){

    $newsletter = get_newsletter($_POST['newsletter']);
    $subscribers = selectQuery("subscribers", "", "");

    foreach($subscribers as $subscriber) {
        // Sending email with login details
        $email_receiver = $subscriber['email'];


        // Create the email and send the message
        $to = $email_receiver; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
        $email_subject = "24CinL Blog News";
        $email_body = $newsletter['content'];
        $headers = "From: noreply@24cinlstaff.org\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: $email";
        mail($to, $email_subject, $email_body, $headers);
    }
}

?>
