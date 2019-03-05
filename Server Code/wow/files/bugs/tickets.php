<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>P2F - APR</title>
</head>
<body><body bgcolor="#2E2E2E" text="#FFFFFF" link="#FC0404" vlink="#FC0404" alink="#FC0404"> 
<center>
<img src="logo_new.png" width="400" height="250" alt="logo"></p>
</center>
<br><br><br>
<br>
</body>
</html> 


<?php
	echo "Game Master Tickets - Ebene : Bugtracker.";
	echo "<br/>";
	echo "<br/>";
    foreach(glob("logs/*") as $file) {
    foreach(file($file) as $line) {
        echo "Datei : " . $file . " - Ticket Inhalt = " . $line . "<br/><br/>";
    }
}
?>