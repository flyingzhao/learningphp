<?php
	class Math{
		const pi=3.1415;
		static function squared($input){
			return $input*$input;
		}
	}

	echo "Math::pi is ".Math::pi."\n";
	echo Math::squared(8);
?>