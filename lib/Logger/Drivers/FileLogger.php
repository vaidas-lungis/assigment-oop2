<?php 
namespace Logger\Drivers;

use Logger\LoggerInterface;
use Exception;

class FileLogger implements LoggerInterface{

	const defaultFile = 'loggedMessages.txt';
	const defaultLogFolder = 'log/';

	public function processLog($msg){
		$file = self::defaultFile;
		$loc = self::defaultLogFolder;
		
		if (file_exists($loc.$file))
			$fp = fopen($loc.$file, 'a');
		else
			$fp = fopen($loc.$file, 'wb');
		if (fwrite($fp, date('Y-m-d H:i:s').' --- '.$msg."\n") === FALSE)
			throw new Exception("Failed to write message to file ".$file, 301);
			  
		fclose($fp);


		return true;
	}
}