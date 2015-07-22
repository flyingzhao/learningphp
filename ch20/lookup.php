<html>
<head>
	<title>Stock Quote from NASDAQ</title>
</head>
<body>
	<?php
	$symbol='AMZN';
	echo "<h1>Stock quote for".$symbol."</h1>";

	$url='http://finance.yahoo.comm/d/quotes.csv'.
		'?s='.$symbol.'&e=.csv&f=sl1d1t1clohgv';
	if (!($content=file_get_contents($url))) {
		die('fail to open '.$url);
	}
	list($symbol,$quote,$date,$time)=explode(',', $content);
	$date=trim($date,'"');
	$time=trim($time,'"');

	echo "<p>".$symbol."was last sold at".$quote."</p>";
	echo "<p>Quote current as of ".$date."at".$time."</p>";

	echo "<p>This information retrived from <br/><a href=\"".$url."\">".$url."</a></p>"

	?>
</body>
</html>