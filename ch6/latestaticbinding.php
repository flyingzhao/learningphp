<?php
	class A{
		public static function who(){
			echo __class__;
		}
		public static function test(){
			static::who();//here comes late static binding
		}
	}
	class B extends A
	{
		public static function who(){
			echo __class__;
		}		
	}

	B::test();
?>