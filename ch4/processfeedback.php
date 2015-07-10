<?php
	$name=trim($_POST['name']);
	$email=trim($_POST['email']);
	$feedback=trim($_POST['feedback']);

	// echo $name."<br />".$email."<br />".$feedback."<br />";
	//set up some static information
	$toaddress="1142749677@qq.com";#feedback@example.com
	$subject="Feedback from website";
	$mailcontent="Customer name:".$name."\n".
			"Customer email:".$email."\n".
			"Customer Comments:".$feedback."\n";
	// echo $mailcontent;
	echo nl2br($mailcontent);
	$fromaddress="From:  webserver@example.com";

	printf("total amount is %d",12);

	//slash
	echo "<p>feedback before slash</p>:";
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

	//invoke mail() function to send mail
	mail($toaddress,$subject,$mailcontent,$fromaddress);//使用mail()函数发送邮件，必须要有一台不需要验证的SMTP服务器。
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