<?php
//This script requires the MYSQLDao class
//the require keyword connects this script to the MYSQLDao.php script
//note to change the notation to reflect the folder structure when changed
require("MySQLDao.php");
require("Conn.php");

//create a variable to hold the array of values(Strings) to be displayed
$returnValue = array();

//Check to see that each of the required strings is inserted 
//Accessing Global arrays such as $_REQUEST directly isnt best practice, but would suffice for testing purposes
//and local deployment
if(empty($_REQUEST["userEmail"]) || empty($_REQUEST["userPassword"]) || empty($_REQUEST["userFirstName"])
		 || empty($_REQUEST["userLastName"])) 
{               
                //Add two string variables "status" and "message" to the array
		$returnValue["status"] = "400";//return a 400 error as the status
		$returnValue["message"] = "Missing required field";//return "Missing required field" as the error message
		echo json_encode($returnValue);//convert the $returnValue array of strings to json format
		return;
}

//Create and instantiate variables to hold given values
//"htmlentities" converts 
$userEmail = htmlentities($_REQUEST["userEmail"]);
$userPassword = htmlentities($_REQUEST["userPassword"]);
$userFirstName = htmlentities($_REQUEST["userFirstName"]);
$userLastName = htmlentities($_REQUEST["userLastName"]);


//Generate secure string using entered password and sha1
$salt = openssl_random_pseudo_bytes(16);
$secure_password = sha1($userPassword . $salt);

//Connect to the database using variables defined in the connection class
$dao = new MySQLDao(Conn::$dbhost, Conn::$dbuser, Conn::$dbpass, Conn::$dbname);
$dao->openConnection();
/*
//Check if user already exists in the database
$userDetails = $dao->getUserDetails($userEmail);//get user details using their email address

if(!empty($userDetails)) { //if no value was returned
    $returnValue["status"] = "400"; //set status in $returnValue array to a 400 error
    $returnValue["message"] = "User already exists"; //and message to show user aleady exists
    echo json_encode($returnValue); //convert to json format
return;
}

//Register user in the database if they don't already exist
$result = $dao->registerUser($userEmail, $userFirstName, $userLastName, $secure_password, $salt);

if($result) {

    $returnValue["status"] = "200";
    $returnValue["message"] = "User is registered";
    $returnValue["userId"] = "user_id";
    $returnValue["userFirstName"] = "first_name";
    $returnValue["userLastName"] = "last_name";
    $returnValue["userEmail"] = "email";
}
else{
    $returnValue["status"] = "400";
    $returnValue["message"] = "Could not register user with provided information";
}

$dao->closeConnection();
echo json_encode($returnValue);

*/

?>