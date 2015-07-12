<?php
	/**
	* 
	*/
	class A
	{
		private function operation1(){
			echo "operation1 is called<br>";
		}		
		protected function operation2(){
			echo "operation2 is called<br>";
		}		
		public function operation3(){
			echo "operation3 is called<br>";
		}		
	}
	/**
	* 
	*/
	class B extends A
	{
		
		function __construct()
		{
			// $this->operation1();
			$this->operation2();
			$this->operation3();
		}
	}
	$b=new B;
	// $b->operation2();
	$b->operation3();
?>