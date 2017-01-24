<?php namespace Crazymeeks\PHPCacher\Core\Logger;

use Crazymeeks\PHPCacher\Core\Response\Response;

trait LoggerTrait{

	protected $status;
	private $logger_filename = "logger.log";
	public	$prefix = "";

	/**
	* Write custom logs in log file
	* @param string $log
	*/

	protected function writeLog($log){
		$file = $_SERVER['DOCUMENT_ROOT'] . '\\'.$this->logger_filename; //temporary
		// var_dump($file);exit;
		//set time prefix and utc
		date_default_timezone_set('Asia/Manila');
		$date = date("[D M Y h:i:s]");
		$prefix = ($this->prefix != "" ? "[".$this->prefix."]" :"");

		//set status
		$status = "[".$this->status."]";
		//set log format [date][status]
		$log = $date.$status.$prefix." - ".$log;

		// check if file exist
		if(file_exists($file)){
			$current = file_get_contents($file);
			// Append a new log to the file
			$current .= $log."\n";

			// Write the contents back to the file
			file_put_contents($file, $current);
		}else{
			$file = fopen($file, "w");
			fwrite($file, $log."\n");
			fclose($file);
		}
	}

	protected function getStatus(){
		return $this->status;
	}


	/**
	* Set status of log
	* @param int $status
	*/
	protected function setStatus($status = 0){
		if(!is_numeric($status)){
			Response::error(['Status' => ['Log status must be integer.']], 500);
			die;
		}
		$this->status = $status;

		switch ($status) {
			case '1':
				$this->status = "Success";
				break;
			case '2':
				$this->status = "Warning";
				break;
			case '3':
				$this->status = "Error";
				break;
			default:
				$this->status = "Statement";
				break;
		}
	}
}