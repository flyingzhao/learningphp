<?php
	/**
	* 
	*/
	class myClass
	{
		public $a="5";
		public $b="7";
		public $c="9";
	}
	$x=new myClass;
	foreach ($x as $attribute) {
		echo $attribute."<br>";
	}
?>