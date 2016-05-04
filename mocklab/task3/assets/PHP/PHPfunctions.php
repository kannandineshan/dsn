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

    $bugName = $_POST["bugname"];
    $bugSummary = $_POST["bugsummary"];
    $bugCategory = $_POST["bugcategory"];

    $sql = "INSERT INTO `bugs` (`bugName`, `bugCategory`, `bugSummary`) VALUES ('$bugName', '$bugSummary', '$bugCategory')";

    $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $result = mysqli_query($db,$sql) or die("Error: ".$sql."<br>".$db->error);

    echo "<SCRIPT>alert('New Bug Has Been Added To The Database!!!');</SCRIPT>";


}
