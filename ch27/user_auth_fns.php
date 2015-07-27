<?php
function register($username,$email,$password){

	$conn=db_connect();
	$result=$conn->query("select * from user where username='".$username."'");
	if (!$result) {
		throw new Exception("Could not query");
	}
	if ($result->num_rows>0) {
		throw new Exception("your name has been registered");
	}
	$query="insert into user values('".$username."',sha1('".$password."'),'".$email."')";
	$result=$conn->query($query);
	if (!$result) {
		throw new Exception("Could not register you in the database");
	}
	return true;
}
function login($username,$passwd){
	//check username and password with db

	//if  yes ,return ture
	//else throw exception
	//connect to db
	$conn=db_connect();
	//check if username is valid
	// echo "select * from user where username='".$username."' and passwd=sha1('".$passwd."')";
	$result=$conn->query("select * from user where username='".$username."' and passwd=sha1('".$passwd."')");
	if (!$result) {
		throw new Exception("You can not log in");
	}
	if ($result->num_rows) {
		return true;	
	}
	else{
		throw new Exception("You can not log in");
		
	}
}
function check_valid_user(){
	//see if anybody is logged in and notify them if not
	if (isset($_SESSION['valid_user'])) {
		echo "Log in as ".$_SESSION['valid_user']."<br>";

	} else {
		// they are logged in
		do_html_heading('Problem:');
		echo "You are not logged in.<br>";
		do_html_url('login.php','Login');
		do_html_footer();
		exit;
	}
	}
?>