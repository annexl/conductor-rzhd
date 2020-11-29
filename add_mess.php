<?php

if(isset($_POST['mess']) && $_POST['mess']!="" && $_POST['mess']!=" ")
{
	$mess=$_POST['mess'];
	$login=$_SESSION['login'];
	include("bd.php");
	$res=mysql_query("INSERT INTO `messages` (`login`,`message`) VALUES ('$login','$mess') ");
}
?>
