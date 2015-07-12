<?php
	require("page.inc");
	/**
	* 
	*/
	class ServicesPages extends Page
	{
		private $row2buttons=array(
			"Re-engineering"=>"reengineering.php",
			"Standards Compliance"=>"standards.php",
			"Buzzwood Compliance"=>"buzzwood.php",
			"Mission Statement"=>"mission.php");
		public function Display(){
			echo "<html>\n<head>\n";
			$this->DisplayTitle();
			$this->DisplayKeywords();
			$this->DisplayStyle();
			echo "</head>\n<body>\n";
			$this->DisplayHeader();
			$this->DisplayMenu($this->button);
			$this->DisplayMenu($this->row2buttons);
			echo $this->content;
			$this->DisplayFooter();
			echo "</body>\n</html>\n";
		} 		
	}
	$services=new ServicesPages();
	$services->content="<p>At TLA Consulting, we offer a number of services.perhaps the 
				productivition of your employees would improve if we reengineer 
				your business.Maybe all your business needs is a fresh mission 
				statement,or anew batch of buzzwood</p>";
	$services->Display();
?>