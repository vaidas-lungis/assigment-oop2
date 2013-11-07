<?php


include 'vendor/autoload.php';

use Logger\Logger;

$loggertype = 'file';
$defaultMessage = 'zinute i '.$loggertype;

if (isset($argv[1]))
	$loggertype = $argv[1];

if (isset($argv[2]))
	$defaultMessage = $argv[2];

try{
	$Logger = new Logger($loggertype);

	$Logger->log($defaultMessage);
}
catch (Exception $e){
	echo $e->getMessage();
}