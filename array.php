<?php
	// $price = array('Tires' => 100,'Oil'=>10,'Spark Plug'=>4);
	// foreach ($price as $key => $value) {
	// 	echo $key."-".$value."<br>";
	// }
	// reset($price);
	// while($element=each($price)){
	// 	echo $element['key'];
	// 	echo "----";
	// 	echo $element['value'];
	// 	echo "<br>";
	// }

	// reset($price);
	// echo reset($price).'<br>';
	// echo current($price)."<br>";
	// echo next($price).'<br>';
	// while(list($key,$value)=each($price)){
	// 	echo $key;
	// 	echo "----";
	// 	echo $value;
	// 	echo "<br>";
	// }

	// $products = array(array('TIR','Tires',100 ),
 // 			array('OIL','Oil',50),
 // 			array('SPK','Spark Plug',4));
	// for ($row=0; $row < 3; $row++) { 
	// 	for ($col=0; $col < 3; $col++) { 
	// 		echo  $products[$row][$col];

	// 	}
	// 	echo "<br />";
	// }
	$products = array('Tires','Oil','Spark Plug');
	for ($i=0; $i < 3; $i++) { 
		echo $products[$i]."<br />";
	}
	// reset($products);
	sort($products);
	for ($i=0; $i < 3; $i++) { 
		echo  $products[$i]."<br />";
	}
	
 ?>