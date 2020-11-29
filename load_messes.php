<?php
include("bd.php");
$res=mysql_query("SELECT * FROM `messages` ORDER BY `id` ");
while($d=mysql_fetch_array($res))
{	
	echo "<b><font color='orange'>".$d['login'].":&nbsp;</font></b>".$d['message']."<br>";
}
?>
