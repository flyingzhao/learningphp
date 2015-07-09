<?php
	//create short variable name
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
	<title>Bob's Auto Parts-Customer Orders</title>
</head>
<body>
	<h1>Bob's Auto Part</h1>
	<h2>Customer Orders</h2>
	<?php
	//read in the entire file
	//each order becoms an element in the array
	$orders=file("$DOCUMENT_ROOT/bob/orders.txt");
	//count the number of orders
	$number_of_orders=count($orders);
	if($number_of_orders==0){
		echo "<p>No orders pending";
	}
	echo "<table border=\"1\">\n";
	echo "<tr><th bgcolor=\"#CCCCFF\">Order Date</th>
		<th bgcolor=\"#CCCCFF\">Tires</th>
		<th bgcolor=\"#CCCCFF\">Oil</th>
		<th bgcolor=\"#CCCCFF\">Spark Plugs</th>
		<th bgcolor=\"#CCCCFF\">Total</th>
		<th bgcolor=\"#CCCCFF\">Address</th>
		<tr>";
	for ($i=0; $i < $number_of_orders; $i++) { 
		$line=explode("\t", $orders[$i]);
		$line[1]=intval($line[1]);
		$line[2]=intval($line[2]);
		$line[3]=intval($line[3]);
		echo "<tr>
			<td>".$line[0]."</td>
			<td align=\"right\">".$line[1]."</td>
			<td align=\"right\">".$line[2]."</td>
			<td align=\"right\">".$line[3]."</td>
			<td align=\"right\">".$line[4]."</td>
			<td>".$line[5]."</td>
		</tr>";
	}
	echo "</table>";
	
	?>
</body>
</html>