<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 22/03/2016
 * Time: 09:34
 */


    //THIS PAGE LOGS OUT A VOLUNTEER

	session_start();
	if(session_destroy()) // Destroying All Sessions
    {
        header("Location: volunteerlogin.php"); // Redirecting To Login Page
    }
?>