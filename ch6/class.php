<?php
	/**
	* a test
	*/
	class classname
	{
		
		function __construct($param)
		{
			echo "constructor called with parameter".$param."<br>";
		}
		public $attribute;
		function operation($param){
			$this->attribute=$param;
			echo $this->attribute."<br>";
		}
		function __get($name){
			return $this->$name;
		}
		function __set($name,$value){
			$this->$name=$value;

		}
	}
	$a=new classname("First");
	// $a->attribute="value";
	// $a->operation("value2");
	// echo $a->attribute;

	$a->__set("attribute","value3");
	// echo $a->attribute;
	echo $a->__get("attribute");
	$b=new classname("Second");
	$c=new classname();
?>