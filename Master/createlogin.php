<?php


	//THIS PAGE IS CALLED WHEN THE ADMIN SUBMITS THE FORM FOR VOLUNTEER-CREATION FROM CREATEUSER.PHP


	//if the http method called is "GET"
	if($_SERVER['REQUEST_METHOD']==='GET'){
		header("Location: createuser.php");	//I'm sending the admin straight to createuser.php if the access is "GET"
		//session_exists();//call the function "session_exists()"	//This is made abundant
	}

	//if the method called is a "POST"
	else if ($_SERVER['REQUEST_METHOD']==='POST'){

        add_to_database();//call the function "add_to_database" which also sends email and sends you back to createuser.php
	}




	//FUNCTIONS:
	
	function add_to_database(){
		
		//connect to the database
		include("db_connection.php");

		//check if there was a connection error and respond accordingly
		if($db->connect_errno){
			die('Connection failed:'.connect_error);
		}
		else{

			//read input details from index.php
			$email=$_POST['email'];




			//create select statement to using firstname and surname as filters
			$query="SELECT `vol_email`
					FROM `volunteers`
					WHERE `vol_email` ='$email'
					LIMIT 1";

			//check to see that sql query executes properly, and return any errors
			$output=$db->query($query) or die("Error: ".$query."<br>".$db->error);

			$return=NULL;

			//go through the array of results returned from the query if any
			while($row = $output->fetch_assoc()) {
				$return=$row["vol_email"];//add the email value to the return variable
				}

			//if $return is no longer NULL, then it means user exists already
			if(isset($return)){
				header("Location: createuser.php?Success=No");
			}
			else{
				//create user in database if they dont exists there already
				$firstname=$_POST['firstname'];
				$surname=$_POST['surname'];
				$password=$_POST['password'];
				$child_matched=$_POST['child_matched'];

				if($child_matched==true){
					$child_gender=$_POST['child_gender'];
					$child_date_of_birth = $_POST['date_of_birth'];
					$dob="date'".$child_date_of_birth."'";

					$insert="INSERT INTO volunteers (vol_email, vol_password, vol_firstname,vol_surname,vol_child_matched,vol_child_gender,vol_child_dob)
						 VALUES('".$email."','".$password."','".$firstname."','".$surname."',".$child_matched.",'".$child_gender."',".$dob.")";
				}
				else{
					$insert="INSERT INTO volunteers (vol_email, vol_password, vol_firstname,vol_surname,vol_child_matched,vol_child_gender,vol_child_dob)
						 VALUES('".$email."','".$password."','".$firstname."','".$surname."',".$child_matched.",NULL,NULL)";
				}



				$outcome=$db->query($insert) or die("Error: ".$insert."<br>".$db->error);

				header("Location: createuser.php?Success=Yes");

				email_volunteer_login();//call the function "email_volunteer_login()"
			}
		}
	}


	//email to volunteer function
	function email_volunteer_login(){

		//setting some variables with form values
		$firstname = $_POST["firstname"];
		$surname = $_POST["surname"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$name = $firstname . " " . $surname;

		//email subject
		$subject = "Befriend A Child - Survey Login";


		//email body in html
		//ATTENTION, THE LINK MAY POINT TO THE MASTER DOMAIN, RATHER THAN YOUR OWN VOLUNTEERLOGIN.PHP
		$txt = "Dear $name,
					<br><br>
					An account has been set up in your name.
					<br>
					If you would like to fill out a survey concerning your experience with Befriend A Child,
					please follow
					<a href='http://befriendachildtestsurvey.azurewebsites.net/Master/volunteerlogin.php'>this link</a>
					and login with:
					<br><br>
					Username: $email
					<br>
					Password: $password
					<br><br>
					You will be able to change your password once logged in.
					<br><br>
					King Regards,
					<br><br>
					The Befriend A Child Team";


		//take in the necessary swiftmailer code
		require_once 'swiftmailer/lib/swift_required.php';

		//this is all swiftmailer magic, using the gmail smtp server of my account...
		$transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
			->setUsername('christophe.meyers.312@gmail.com')
			->setPassword('AnnachengAddress');

		//Creates an instance of the mailer
		$mailer = Swift_Mailer::newInstance($transporter);

		//the message supplies some more detailed info
		$message = Swift_Message::newInstance('Befriend A Child Test Mail')
			->setFrom(array('christophe.meyers.312@gmail.com' => 'Christophe Meyers'))	//shows my name when email arrives
			->setTo(array($email => $name))	//shows volunteer name as linked to their email address
			->setBody($txt, "text/html");	//tells swiftmailer that we're using html text

		//Finally the mail is sent
		$result = $mailer->send($message);


	}

	//Abundant function
	/*function session_exists(){
		
		$db = new MySQLi(
						'ap-cdbr-azure-east-c.cloudapp.net', //server or host address
						'b35e94884f471c', //username for connecting to database
						'90efdea3', //user's password 
						'befriendachildtestDB' //database being connected to
						);
		
		
		// SQL Query To Fetch Complete Information Of User
		//check if there was a connection error and respond accordingly
				if($db->connect_errno){
					die('Connection failed:'.connect_error);
				}
				else{
					session_start();// Starting Session
					// Establishing Connection with Server by passing server_name, user_id and password as a parameter
					// Selecting Database
					$user_check=$_SESSION['ad_email']; // Storing Session
					
					//select all values from database using the entered values as filter
					$query="SELECT *
					FROM `administrators`
					WHERE `ad_email` = '$user_check' LIMIT 1";
					$output=$db->query($query) or die("Selection Query Failed !!!");
				}
				$login_session=NULL;
				while($row = $output->fetch_assoc()) {
					$login_session=$row["ad_email"];
					}
		if(isset($login_session)){
			//show_create_user();
			header("Location: createuser.php");
		}
		else{
			header("Location: index.php");
		}
	}*/

?>