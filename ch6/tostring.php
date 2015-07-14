<?php
	class Printable{
		public $testone;
		public $testtwo;
		public function __toString(){
			return(var_export($this,TURE));
		}
	}
	$p=new Printable;
	echo $p;
?>