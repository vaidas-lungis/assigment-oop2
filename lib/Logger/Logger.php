<?php 

namespace Logger;
use Logger\Drivers\MySql;
use Logger\Drivers\FileLogger;
use Exception;

class Logger{
	private $driver = null;

	function __construct ($type = null){
		switch (strtolower($type)) {
			case 'mysql':
				$this->driver = new MySql();
				break;

			case 'file':
				$this->driver = new FileLogger();
				break;
			
			default:
				throw new Exception("This Logger type is not available: $type \n", 1);
				break;
		}
	}

	public function log ($msg){
		return $this->driver->processLog($msg);
	}
}