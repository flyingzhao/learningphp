<?php
	$name=$_POST['name'];
	$email=$_POST['email'];
	$feedback=$_POST['feedback'];

	//set up some static information
	$toaddress="1142749677@qq.com";#feedback@example.com
	$subject="Feedback from website";
	$mailcontent="Customer name:".$name."\n".
			"Customer email".$email."\n".
			"Customer Comments".$feedback."\n";
	$fromaddress="From:  webserver@example.com";

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