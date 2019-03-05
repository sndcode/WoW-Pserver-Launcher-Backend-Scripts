<?php
/*Config*/

$realmd = array(
'db_host'=> 'localhost', //ip of db realm
'db_username' => 'root',//realm user
'db_password' => '',//realm password
'db_name'=> 'tbc_auth',//realm db name
);


///////////////Start script//////////////////

/*
Function name: CHECK FOR SYMBOLS
Description: return TRUE if matches. ( True = OK ) ( False = NOT OK)
*/
function check_for_symbols($string){
$len=strlen($string);
$alowed_chars="abcdefghijklmnopqrstuvwxyzÃƒÂ¦ÃƒÂ¸ÃƒÂ¥ABCDEFGHIJKLMNOPQRSTUVWXYZÃƒ†Ãƒ˜Ãƒ…";
for($i=0;$i<$len;$i++)if(!strstr($alowed_chars,$string[$i]))return TRUE;
return FALSE;

}
/*
Function name: OUTPUT USERNAME:PASSWORD AS SHA1 crypt
Description: obvious.
*/
function sha_password($user,$pass){
$user = strtoupper($user);
$pass = strtoupper($pass);

return SHA1($user.':'.$pass);
}

if ($_POST['registration']){
/*Connect and Select*/
$realmd_bc_new_connect = mysql_connect($realmd[db_host],$realmd[db_username],$realmd[db_password]);
$selectdb = mysql_select_db($realmd[db_name],$realmd_bc_new_connect);
if (!$realmd_bc_new_connect || !$selectdb){
echo "Could NOT connect to db, please check the config part of the file!";
die;
}

/*Checks*/
$username = $_POST['username'];
$password = sha_password($username,$_POST['password']);

$qry_check_username = mysql_query("SELECT username FROM `account` WHERE username='$username'");

if (check_for_symbols($_POST[password]) == TRUE || check_for_symbols($username) == TRUE || mysql_num_rows($qry_check_username) != 0){
echo "Error with creating account, might already be in use or your username / password has invalid symbols in it.";
}else{
mysql_query("INSERT INTO account (username,sha_pass_hash,expansion) VALUES ('$username','$password' ,'1' )");// Insert into database.
echo "Account created.";
}


}else{
///////////////Stop script, Start HTML//////////////////
?><style type="text/css">

body,td,th {
	color: #999999;
}
body {
	background-color: #000000;
}
#Layer1 {
	position:absolute;
	left:24px;
	top:31px;
	width:192px;
	height:75px;
	z-index:1;
}

</style>


<title>Registration Page</title><div id="Layer1">
  <p><strong><a href="../index.php">BACK TO HOMEPAGE</a></strong></p>
  <p> <a href="/forum/index.php">BACK TO FORUM </a></p>
</div>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <div align="center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><strong>Username 
      <input type="text" name="username">
    </strong></p>
    <p>&nbsp;</p>
    <p><strong>Password</strong>  
      <input type="password" name="password">
    </p>
    <p> 
      <input name="registration" type="submit" value="Register" />
    </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</form>


<?php
// Do not remove this;)
}
?>
