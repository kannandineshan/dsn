<?php

class MySQLDao {
		var $dbhost = null;
		var $dbuser = null;
		var $dbpass = null;
		var $conn = null;
		var $dbname = null;
		var $result = null;

function _construct($dbhost, $dbuser, $dbpass, $dbname) {
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
}

public function openConnection() {
                $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
                if(mysqli_connect_errno()){
                        throw new Exception("Could not establish connection with database");
                }
}

//This class-level function closes connection to the database
public function closeConnection() {
		if ($this->conn != null){
                    $this->conn->close();
                }
}

//This function takes in user email and returns an array containing the details of the user
public function getUserDetails($email) {
                $returnValue = array();
                $sql = "select * from `users` where `email`='".$email."'";

                $result = $this->conn->query ($sql);
                if($result!=null && (mysqli_num_rows($result)>=1)) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    if (!empty($row)) {
                        $returnValue = $row;
                    }
                }
                return $returnValue;
}

//This function takes user details: email, firstname, lastname, password, and salt, and registers it in the database
public function registerUser($email, $first_name, $last_name, $password, $salt) {
                $sql = "insert into `users` set `email`=?, `first_name`=?, `last_name`=?, `user_password`=?, `salt`=?";
                $statement = $this->conn->prepare($sql);

                    if (!$statement) {
                            $statement->bind_param("sssss", $email, $first_name, $last_name, $password, $salt);
                        }
                        $returnValue = $statement->execute();

                return $returnValue;
}


/*public function getConnection() {
		return $this->conn;

public function getUserDetailsWithPassword($email, $user-Password) {
$returnValue = array();
$sql = "select `id`,`user_email` from `users` where `user_email`='".$email."' and user_password='".$userPassword."'";

$result = $this->conn->query($sql);
if($result != null && (mysqli_num_rows($result) >= 1)) {
$row = $result->fetch_array(MYSQLI_ASSOC);
if(!empty($row)) {
$returnValue = $row;
}
}
return $returnValue;
}

*/
}
?>