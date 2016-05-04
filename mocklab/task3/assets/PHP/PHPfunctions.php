<?php
/**
 * Created by PhpStorm.
 * User: Dinesh
 * Date: 01/05/2016
 * Time: 22:18
 */

include("connection.php");


function getheader(){

    $header = $_GET["header"];

    echo $header;
}


function getbugsdetails(){

    $bugCategory = $_GET["bugCategory"];


    if($bugCategory == null){

        $sql = "SELECT * FROM bugs";

        $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

        $result = mysqli_query($db,$sql);

        $db->close();

        return $result;
    }else{

        $sql = "SELECT * FROM bugs WHERE bugCategory = '$bugCategory'";

        $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

        $result = mysqli_query($db,$sql);

        $db->close();

        return $result;
    }
}

function addbugsdetails(){


    if($db->connect_errno){
        die('Connection failed:'.connect_error);
    }
    else {


        //read input details from addbugs.php
        $bugName = $_POST['bugname'];


        //create select statement to using firstname and surname as filters
        $query = "SELECT `bugName` FROM `bugs` WHERE `bugName` ='$bugName' LIMIT 1";

        $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        //check to see that sql query executes properly, and return any errors
        $output = $db->query($query) or die("Error: " . $query . "<br>" . $db->error);

        $return = NULL;

        //go through the array of results returned from the query if any
        while ($row = $output->fetch_assoc()) {
            $return = $row["bugName"];//add the email value to the return variable
        }


        //if $return is no longer NULL, then it means user exists already
        if (isset($return)) {
            header("Location: addbugs.php?Success=No");
        } else {


            $bugName = $_POST["bugname"];
            $bugSummary = $_POST["bugsummary"];
            $bugCategory = $_POST["bugcategory"];

            $sql = "INSERT INTO `bugs` (`bugName`, `bugSummary`, `bugCategory`) VALUES ('$bugName', '$bugSummary', '$bugCategory')";

            $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

            $result = mysqli_query($db, $sql) or die("Error: " . $sql . "<br>" . $db->error);

            header("Location: addbugs.php?Success=Yes");

        }
    }
}
