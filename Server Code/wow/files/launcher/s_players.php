
<?php
require_once ( 'cfg.php'); //Load database connection details
$conn = mysql_connect($host, $user, $pass) or die('Connection failed: ' . mysql_error());
mysql_select_db($mangoscharacters, $conn) or die('Select DB failed: ' . mysql_error());
$sql = "SELECT Count(Online) FROM `characters` WHERE `online` = 1";
$result = mysql_query($sql, $conn);
$row = mysql_fetch_array($result);
$online = $row["Count(Online)"];
echo "$online";
//Give out number of player online
?>