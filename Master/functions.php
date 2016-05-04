<?php

define("host","ap-cdbr-azure-east-c.cloudapp.net");
define("user", "b35e94884f471c");
define("password", "90efdea3");
define("database", "befriendachildtestDB");

function save_user() {

    $login_name = $_POST['loginName'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $surName = $_POST['surName'];
    $gender = $_POST['gender'];
    $dob_day = $_POST['dob_day'];
    $dob_month = $_POST['dob_month'];
    $dob_year = $_POST['dob_year'];
    $dob = $dob_month . "/" . $dob_day . "/" . $dob_year;
    $address = $_POST['address'];
    $imageurl = saveImage();
    $sql = "insert into volunteers (vol_email,vol_password,vol_firstname,vol_surname)values('$login_name','$password','$firstName','$surName')";
    $mysqli = new mysqli(host, user, password, database);
    $mysqli->query($sql);
    $mysqli->close();
}

//end function
function saveImage() {
    if (is_uploaded_file($_FILES["file"]["tmp_name"])) {

        $maxsize = 20000000;

        $size = $_FILES["file"]['size'];

        if (is_valid_type($_FILES['file']['type'])) {

            if ($size < $maxsize) {
                $TARGET_PATH = 'images/users/';
                $TARGET_PATH.=$_FILES['file']['name'];
//                echo $TARGET_PATH;
//                echo '';
//                die();
                move_uploaded_file($_FILES['file']['tmp_name'], $TARGET_PATH);
                return $TARGET_PATH;
            }
        }
    } else {
        return "";
    }
}

//end function
function is_valid_type($type) {

    // This is an array that holds all the valid image MIME types

    $valid_types = array("image/jpg", "image/jpeg", "image/bmp", "image/gif", "image/png");



    if (in_array($type, $valid_types))
        return true;

    return false;
}

//end is_valid_type()



function verifyUserName($username) {
    $sql = "select * from administrators where ad_email='$username'";
	//echo $sql;
	//	echo "";
	//	die();
    $mysqli = new mysqli(host, user, password, database);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
    $result = $mysqli->query($sql);
	
    if (mysqli_num_rows($result) > 0) {		
        return TRUE;		
    }
    return FALSE;
}

//end function
function verifyPassword($username, $password) {
    $sql = "select * from administrators where ad_email='$username' and ad_password = '$password'";

    $mysqli = new mysqli(host, user, password, database);
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) > 0) {		
        return TRUE;
    }
    return FALSE;
}

//end functio
function verifyUser($username, $password) {

    if (verifyUserName($username)) {
        if (verifyPassword($username, $password)) {
            return true;
        }
        return true;
    }
    return false;
}

//end function

function is_admin() {
    if (isset($_SESSION['is_admin_logged_in'])) {
        return true;
    } else {
        return false;
    }
}

//end function

function getAllRegisteredUsers() {
    $sql = "select * from volunteers ORDER BY vol_firstname";

    $mysqli = new mysqli(host, user, password, database);
    $result = $mysqli->query($sql);

    $mysqli->close();

    return $result;
}

//end function

function getUserSubmissions($vol_email){

    $sql = "select * from submissions where vol_id= (select vol_id from volunteers where vol_email='$vol_email')";
    $mysqli = new mysqli(host, user, password, database);
    $result = $mysqli->query($sql);
    $mysqli->close();

    return $result;
}

function getEventDetails($event_date, $vol_email){

    $sql = "select question_text, answer_text_req, answer_text_opt from answers, questions where submission_id =(select submission_id from submissions where event_date ='$event_date' and vol_id =(select vol_id from volunteers where vol_email='$vol_email')) and questions.question_id = answers.question_id group by answers.question_id";
    $mysqli = new mysqli(host, user, password, database);
    $result = $mysqli->query($sql);
    $mysqli->close();

    return $result;
}

function deleteUser($login_name) {

    $sql = "delete from volunteers where vol_email='$login_name'";
    $mysqli = new mysqli(host, user, password, database);
    $mysqli->query($sql);
    $mysqli->close();
}

//end function

function getUser($login_name) {
    $sql = "select * from volunteers where vol_email='$login_name'";

    $mysqli = new mysqli(host, user, password, database);
    $result = $mysqli->query($sql);

//    $mysqli->close();

    return $result;
}

//end function

function updateUser() {
    $login_name = $_POST['loginName'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $surName = $_POST['surName'];
    $childMatched = $_POST['child_matched'];

    $login_name_prev = $_POST['user_login_prev'];
    $result = getUser($login_name_prev);
    $row = mysqli_fetch_array($result);
    $imageurl_old = $row['imageurl'];
    $imageurl = saveImage();
    if (strlen($imageurl) == 0) {
        
        $imageurl = $imageurl_old;
    } else {
        unlink($imageurl_old);
    }

    if($childMatched==true){
        $child_gender=$_POST['child_gender'];
        $child_date_of_birth = $_POST['date_of_birth'];
        $dob="date'".$child_date_of_birth."'";

        $sql = "update volunteers
            set vol_email='$login_name',
                vol_password='$password',
                vol_firstname='$firstName',
                vol_surname='$surName',
                vol_child_matched=".$childMatched.",
                vol_child_gender='$child_gender',
                vol_child_dob=".$dob."
            where vol_email='$login_name_prev'";

    }
    else{
        /*$child_gender = "other";
        $dob = "date'1991-03-12'";*/

        $sql = "update volunteers
            set vol_email='$login_name',
                vol_password='$password',
                vol_firstname='$firstName',
                vol_surname='$surName',
                vol_child_matched=".$childMatched.",
                vol_child_gender=NULL,
                vol_child_dob=NULL
            where vol_email='$login_name_prev'";


    }




    $mysqli = new mysqli(host, user, password, database);


    $mysqli->query($sql) or die("Error: ".$sql."<br>".$mysqli->error);

    $mysqli->close();
    
    }

//end function