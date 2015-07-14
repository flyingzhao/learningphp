<?php
	
	class myException extends Exception
	{
		
		function __toString()
		{
			return "<table border=\"1\">
				<tr>
				<td><strong>Exception".$this->getCode().
				":".$this->getMessage()."</strong><br>"."in".$this->getFile().
				"on line".$this->getLine()."</td></tr>
				</table><br>";
		}
	}
	try {
		throw new myException("A terrible error has occured", 45);
		
	} catch (myException $e) {
		echo $e;
	}
?>