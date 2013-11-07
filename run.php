<?php


include 'vendor/autoload.php';

use Logger\Logger;

$loggertype = 'file';
if (isset($argv[1]))
	$loggertype = $argv[1];

try{
	$Logger = new Logger($loggertype);

	$Logger->log('zinute i '.$loggertype);
}
catch (Exception $e){
	echo $e->getMessage();
}