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

function change_password($username,$old_passwd,$new_passwd){
	//change password for username 
	//return tyre or false

	login($username,$old_passwd);
	$conn=db_connect();
	$result=$conn->query("update user 
		set passwd=sha1('".$new_passwd."') 
		where username='".$username."'");
	if (!$result) {
		throw new Exception("Password could not be changed");
	}else{
		return true;
	}
}
function reset_password($username){
	//set password to a random value
	//return new password or false on failure

	$new_passwd=get_random_word(6,13);
	if ($new_passwd==false) {
		throw new Exception("Could not generate new password");
	}

	$random_number=rand(0,999);
	$new_passwd.=$random_number;

	//set new password
	$conn=db_connect();
	$result=$conn->query("update user 
			set passwd=sha1('".$new_passwd."')
			where username='".$username."'");
	if (!$result) {
		throw new Exception("Could not change password", 1);
		
	} else {
		return $new_passwd;
	}
	
}
function get_random_word($min_length,$maxlength){
	//grab a random word from dictionary between the two lengths and return it

	//generate a random word
	$word=' ';
	//remember to change this path to suit your system
	$dictionary='/usr/share/dict/words';
	$fp=@fopen($dictionary,'r');
	if (!$fp) {
		return false;
		}	
	$size=filesize($dictionary);

	//go to a random location in dictionary
	$rand_location=rand(0,$size);
	fseek($fp, $rand_location);

	//get the next whole word of the right length in the file
	while ((strlen($word)<$min_length)||(strlen($word)>$maxlength)||(strstr($word, "'"))) {
		if (feof($fp)) {
			fseek($fp, 0);	
			}		
		$word=fgets($fp,80);
		$word=fgets($fp,80);	
	}
	$word=trim($word);
	return $word;
}

function notify_password($username,$password){
	//notify the user that thir password has been changed
	$conn=db_connect();
	$result=$conn->query("select email from username where username='".$username."'");
	if (!$result) {
		throw new Exception("Could not find email address");
	}
	else if ($result->num_rows==0) {
		throw new Exception("Could not find email address");
	}else{
		$row=$conn->fetch_object();
		$email=$row->email;
		$from="from:suppoert@phpbookmark\r\n";
		$mesg="Your PHPBookmark password has been changed to".$password."\r\n".
			"Please change it next time you log in.\r\n";
		if (mail($email, 'PHPBookmark login infromation', $mesg,$from)) {
			return true;
		}else{
			throw new Exception("Could not send email");
			
		}
	}
}
?>