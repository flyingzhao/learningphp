<?php
	$name=trim($_POST['name']);
	$email=trim($_POST['email']);
	$feedback=trim($_POST['feedback']);

	// echo $name."<br />".$email."<br />".$feedback."<br />";
	//set up some static information
	$toaddress="feedback@example.com";
	$subject="Feedback from website";
	$mailcontent="Customer name:".$name."\n".
			"Customer email:".$email."\n".
			"Customer Comments:".$feedback."\n";
	// echo $mailcontent;
	echo nl2br($mailcontent);
	$fromaddress="From:  webserver@example.com";
	//invoke mail() function to send mail
	mail($toaddress,$subject,$mailcontent,$fromaddress);//使用mail()函数发送邮件，必须要有一台不需要验证的SMTP服务器。

	//printf
	printf("total amount is %d",12);

	//slash
	echo "<p>feedback before slash:</p>";
	$feed="Your customer service told me \"you don't need any guarantee\"";
	echo "<p>$feed</p>";
	echo "<p>feedback after adding slash:</p>";
	echo  "<p>".addslashes($feed)."</p>";
	echo "<p>feedback after striping slash:</p>";
	echo  "<p>".stripslashes($feed)."</p>";

	//explode
	$emailarray=explode('@', $email);
	if(strtolower($emailarray[1])=="bigcustomer.com"){
		$toaddress="Bob@example.com";
	}
	else{
		$toaddress="feedback@example.com";
	}
	$new_email=implode('@', $emailarray);

	//substr
	$test='Your customer service is excellent';
	echo substr($test, 5,3);

	//strlen
	if(strlen($email)<6){
		echo 'That email address is not valid';
		// exit;
	}

	//strstr
	if (strstr($feedback, 'shop')) {
		$toaddress='retail@example.com';
	}
	elseif (strstr($feedback, 'delivery')) {
		$toaddress='fulfillment@example.com';
	}
	elseif (strstr($feedback, 'bill')) {
		$toaddress='account@example.com';
	}
	echo '<p>'.strstr("helloworld", 'o').'</p>';
	echo "<p>".strpos("helloworld", 'l').'</p>';
	$result=strpos("helloworld", 'l');
	if ($result===false) {
		echo "<p>Not found</p>";
	}
	else{
		echo "<p>Found at position</p>".$result;
	}

	//str_replace
	$offcolor = array('shit' ,'fuck');
	$feedback=array("shit 123 fuck","hellofuck");
	$feedback=str_replace($offcolor, '%!@*', $feedback);
	echo "<p>$feedback[1]</p>";




	
?>
<html>
	<head>
		<title>Feedback submited</title>
	</head>
	<body>
		<h1>Feedback Submited</h1>
		<p>Your feedback has been sent.</p>
	</body>
</html>