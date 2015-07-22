<html>
<head>
	<title>Site submit results</title>
</head>
<body>
	<h1>Site submit results</h1>
	<?php
	$url=$_POST['url'];
	$email=$_POST['email'];
	$url=parse_url($url);
	$host=$url['host'];
	echo "$host<br>";
	echo "HOST".gethostbyaddr("121.194.0.221")."<br>";
	if (!$ip=gethostbyname($host)) {
		echo "host for URL does not have vaild ip";
		exit;
	}
	echo "host is at ip $ip<br/>";


	$email=explode("@", $email);
	$emailhost=$email[1];
	if (!dns_get_mx($emailhost,$mxhostsarr)) {
		echo "email address is not valid";
		exit;
	}
	echo "email is delivered via:<br>";
	foreach ($mxhostsarr as $mx) {
		echo "$mx<br>";
	}
	echo "all submit is ok<br>";
	?>
</body>
</html>