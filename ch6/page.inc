<?php
	class page
	{
		//class page's attributes
		public $content;
		public $title="TLA Consulting Pty Ltd";
		public $keywords="TLA Consulting,Three Letter Abbreviation,
					Some of my best friends are search engines.";
		public $button = array('Home' =>'home.php' , 
					'Content'=>'contact.php',
					'Service'=>'services.php',
					'Site Map'=>'map.php');
		//class page's operation
		public function __set($name,$value){
			$this->$name=$value;

		}
		public function Display(){
			echo "<html>\n<head>\n";
			$this->DisplayTitle();
			$this->DisplayKeywords();
			$this->DisplayStyle();
			echo "</head>\n<body>\n";
			$this->DisplayHeader();
			$this->DisplayMenu($this->button);
			echo $this->content;
			$this->DisplayFooter();
			echo "</body>\n</html>\n";
		}
		public function DisplayTitle(){
			echo "<title>".$this->title."</title>";

		}
		public function DisplayKeywords(){
			echo "<meta name=\"keywords\"
				content=\"".$this->keywords."\"/>";
		}
		public function DisplayStyle(){

?>
<style type="text/css">
	h1{color:white;font-size: 24pt;text-align: center;font-family: sans-serif,arial;}
	.menu{color: white;font-size: 12pt;text-align: center;font-family: sans-serif,arial;font-weight: bold;}
	td{background: black;}
	p{color: black;font-size: 12pt;text-align: justify;font-family: sans-serif,arial;}
	p.foot{color: white;font-size: 9pt;text-align: center;font-family: sans-serif,arial;font-weight: bold;}
	a:link,a:visited,a:active{color: white;}
</style>
<?php
	}
	public function DisplayHeader(){
?>
<table width="100%" cellpadding="12" cellspacing="0" border="0">
		<tr bgcolor="black">
		<td align="left"><img src="logo.gif"alt="TLA logo"height="70"width=70></td>
		<td><h1>TLA Consulting</h1></td>
		<td align="right"><img src="logo.gif"alt="TLA logo"height="70"width=70></td>
	</tr>
</table>
<?php
	}
	public function DisplayMenu($buttons){
		echo "<table width=\"100%\" bgcolor=\"white\"cellpadding=\"4\"cellspacing=\"4\">\n";
		echo "<tr>\n";

		//calculate button size
		$width=100/count($buttons);
		while (list($name,$url)=each($buttons)) {
			$this->DisplayButton($width,$name,$url,!$this->IsURLCurrentPage($url));
			}
			echo "</tr>\n";
			echo "</table>\n";

	}
	public function IsURLCurrentPage($url){
		if (strpos($_SERVER['PHP_SELF'], $url)==false) {
			return false;
		}
		else{
			return true;
		}
	}
	public function DisplayButton($width,$name,$url,$active=true){
			if ($active) {
				echo "<td width=\"".$width."%\">
					<a href=\"".$url."\">
					<img src=\"s-logo.gif\"alt=\"".$name."\"border=\"0\"/></a>
					<a href=\"".$url."\"><span class=\"menu\">".$name."</span></a>
					</td>";
			}
			else{
				echo "<td width=\"".$width."%\">
				<img src=\"side-logo.gif\">
				<span class=\"menu\">".$name."</span></td>";
			}
		}
		public function DisplayFooter(){
?>
<table width="100%"bgcolor="black"cellpadding="12"border="0">
	<tr>
		<td>
			<p class="foot">&copy;TLA Consulting Pty LTD.</p>
			<p class="foot">Please see our<a href="legal.php">legal information page</a></p>
		</td>
	</tr>
</table>
<?php
	}
}

?>