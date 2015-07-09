<?php
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];

?>
<html>
	<head>
		<title>Bob's Auto Parts - Customer Orders</title>
	</head>
	<body>
		<h1>Bob's Auto Parts</h1>
		<h2>Customer Orders</h2>
		<?php
			// @$fp=fopen("$DOCUMENT_ROOT/bob/orders.txt",'rb');
			// flock($fp,LOCK_SH);
			//  if(!$fp){
			// 	echo "<p><strong>No o	rders pending,try again later</strong></p>";
			// 	exit;
			// }
			// while (!feof($fp)) {
			// 	$orders=fgets($fp);
			// 	echo $orders."<br>";
			// }
			// // // while (!feof($fp)) {
			// // // 	$char=fgetc($fp);
			// // // 	// echo $char;
			// // // 	 echo ($char=="\n" ? "<br>":$char);
				
			// // // }
			// flock($fp, LOCK_UN);
			// fclose($fp);
			 // readfile("$DOCUMENT_ROOT/bob/orders.txt");
			// echo filesize("$DOCUMENT_ROOT/bob/orders.txt");
			// $fp=fopen("$DOCUMENT_ROOT/bob/orders.txt",'rb');
			// echo nl2br(fread($fp, filesize("$DOCUMENT_ROOT/bob/orders.txt")));
			// echo 'final position of the file'.(ftell($fp)).'<br />';
			// rewind($fp);
			// echo 'new position'.ftell($fp).'<br /';
		$orders=file("$DOCUMENT_ROOT/bob/orders.txt");
		$number_of_orders=count($orders);
		// echo $number_of_orders;
		for ($i=0; $i < $number_of_orders; $i++) { 
			echo $orders[$i]."<br />";
		}


			// fclose($fp);

		?>
	</body>
</html>