<?php
	require_once("file_exception.php");
	//create variable names
	$tireqty=$_POST['tireqty'];
	$oilqty=$_POST['oilqty'];
	$sparkqty=$_POST['sparkqty'];
	$find=$_POST['find'];
	$address=$_POST['address'];
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
	<title>Bob's Auto Parts -Order Results</title>
</head>
<body>
	<h1>Bob's Auto Parts</h1>
	<h2>Order Results</h2>

<?php

	$totalqty=0;
	$totalqty=$tireqty+$oilqty+$sparkqty;
	echo "<p>Items Ordered:".$totalqty."</p>";
	$totalamount=0.00;

	define('TIREPRICE', 100);
	define('OILPRICE', 10);
	define('SPARKPRICE', 4);

	$totalamount=$tireqty*TIREPRICE+$oilqty*OILPRICE+$sparkqty*SPARKPRICE;
	echo "Subtotal:    $".number_format($totalamount,2)."<br>";
	$taxrate=0.1;#local taxrate is 0.1
	$totalamount=$totalamount*(1+$taxrate);
	echo "Total inclde tax $".$totalamount."<br>";
	echo '<p>Order Processed.</p>';
	$date= date('h:i,jS F Y');
	echo "<p>date is";
	echo $date;
	echo "<p>";
	switch ($find) {
		case "a":
			echo "<p>Regular Customer</P>";
			break;
		case "b":
			echo "<p>TV Advertise</p>";
			break;
		case "c":
			echo "<p>Phone Directory</p>";
			break;
		case "d":
			echo "<p>word of mouth</p>";
			break;
		default:
			echo "<p>No idea</p>";
			break;
	}


 // 	echo $DOCUMENT_ROOT;
	// @$fp=fopen("$DOCUMENT_ROOT/bob/ch7/orders.txt",'ab');
	// if(!$fp){
	// 	echo "<p>Your order could not be processed at this time</p></body></html>";
	// 	exit;
	// }
	// $outputstring=$date."\t".$tireqty."tires \t".$oilqty."oil\t".$sparkqty."spark plugs \t$".$totalamount."\t".$address."\n";
	// fwrite($fp, $outputstring);
	// fclose($fp);

	$outputstring=$date."\t".$tireqty."tires \t".$oilqty."oil\t".$sparkqty."spark plugs \t$".$totalamount."\t".$address."\n";
	try {
		if (!($fp=@fopen("$DOCUMENT_ROOT/bob/ch7/orders.txt",'ab'))) {
			throw new fileOpenException();
		}
		if (!flock($fp,LOCK_EX)){
			throw new fileLockException();
		}
		if (!fwrite($fp, $outputstring,strlen($outputstring))) {
			throw new fileWriteException();
		}
		flock($fp, LOCK_UN);
		fclose($fp);
		echo "<p>Order written</p>";
	} catch (fileOpenException $foe) {
		echo "<p><strong>Orders file can not be opened</strong></p>";
	}
	catch(fileLockException $e){
		echo "<p><strong>Orders file can not be processed now</strong></p>";	
	}
	catch(fileWriteException $e){
		echo "<p><strong>Orders file can not be processed now</strong></p>";	
	}


	// echo "tire  $tireqty <br />";
	// echo "oil  ".$oilqty."<br>";
	// echo"spark ".$sparkqty."<br>";
?>
</body>
</html>