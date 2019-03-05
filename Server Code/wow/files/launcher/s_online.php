<?php
require_once ( 'cfg.php'); 
if (! $sock = @fsockopen($ip, $wow_port, $num, $error, 5)) 
echo "offline";
else{ 
echo "online";
fclose($sock); } 

?>