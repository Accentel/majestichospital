<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$name=$_SESSION['name1'];
	if($name == "admin")
	{
	//echo "hi";
	include("menu/menu.php");
	//include("main_menu old.php");
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	}
	else
	{
	//echo "welcome";
		//include("main_menu1.php");
	include("menu/menu1.php");
	//echo "hi";
	}	
	?>
 