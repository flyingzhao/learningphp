<?php
	try {
		throw new Exception("A terrible error has occured", 43);
		
	} catch (Exception $e) {
		echo "Exception".$e->getCode().":".$e->getMessage()."<br>".
			"in".$e->getFile()."on line".$e->getLine()."<br>";
		echo $e;
	}
?>