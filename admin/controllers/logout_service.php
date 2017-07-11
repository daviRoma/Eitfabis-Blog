<?php

session_start();

if (isset($_SESSION['username'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();

    // Destroy the session
	if(session_destroy()){
		// Redirect to the home page
		header("location: ../login.php");
		exit();
	}
}

?>
