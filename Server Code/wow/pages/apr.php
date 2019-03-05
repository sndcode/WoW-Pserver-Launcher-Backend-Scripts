<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>P2F - APR</title>
</head>
<body><body bgcolor="#2E2E2E" text="#FFFFFF" link="#FC0404" vlink="#FC0404" alink="#FC0404"> 
<center>
<img src="../files/pics/logo_new.png" width="400" height="250" alt="logo"></p>
<br><br><br>

<form method="POST" action=''>

  <h1>Administrator Password Reset - P2F Network</h1>
  <br><br>
  
  Username : <br>
  <input type="text" name="user" /><br><br>
  Password : <br>
  <input type="text" name="pass" /><br><br>
  Admin Key : <br>
  <input type="text" name="key" /><br><br>
  <br>  <br>  <br>
<input type='submit' name='submit' value='Reset account password' />
<br><br>
<input type='submit' name='read' value='Backup password' />
</form>
</center>
<br>
</body>
</html> 

<?php 

echo "<div style='text-align:center'>"; //Center all the texts
require_once ( '../settings/cfg.php'); //Load database connection details


if(isset($_POST['submit'])) //On button pressed
{ 

	$mysqli = new mysqli($host, $user, $pass, $mangosrealm);
    $user = $mysqli->real_escape_string($_POST['user']);
	$pass = $mysqli->real_escape_string($_POST['pass']);
	$enteredkey = $mysqli->real_escape_string($_POST['key']);
	if($user != "" and $pass != "" and $enteredkey == $adminkey)
	{
		$mysqli->query("UPDATE `account` SET `sha_pass_hash`=SHA1(CONCAT(UPPER(`username`),':',UPPER('$pass'))), `v`=0, `s`=0 WHERE `username` = '$user';");
		echo "Account password updated.";
	}
	else
	{
		echo "Input wrong or empty.";
	}


} 

if(isset($_POST['read'])) //On button pressed
{ 
    
	$mysqli = new mysqli($host, $user, $pass, $mangosrealm);
    $user = $mysqli->real_escape_string($_POST['user']);
	$enteredkey = $mysqli->real_escape_string($_POST['key']);
	if($user != "" and $enteredkey == $adminkey)
	{
		$returnstring = $mysqli->query("SELECT `sha_pass_hash` FROM account WHERE `username` = '$user';");  
		while($row = $returnstring->fetch_assoc())
		{
			echo $row["sha_pass_hash"]; 
		}
	}
	else
	{
		echo "Input wrong or empty.";
	}
} 


?> 