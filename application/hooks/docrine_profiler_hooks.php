<?php
class Doctrine_Profiler_Hooks {

	public static $profiler;

	public function profiler_start() {

		self::$profiler = new Doctrine_Connection_Profiler();
		foreach (Doctrine_Manager::getInstance()->getConnections() as $conn) {
			$conn->setListener(self::$profiler);
		}

	}

	public function profiler_end() {

		$filepath = APPPATH."logs/doctrine_".date('Y-m-d').".php";
		$output = '';

		if ( ! file_exists($filepath))
		{
			$output .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">\n\n";
		}

		if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
		{
			return FALSE;
		}

		// analyze the profiler data
		$time = 0;
		$events = array();
		foreach (self::$profiler as $event) {
		    $time += $event->getElapsedSecs();
			if ($event->getName() == 'query' || $event->getName() == 'execute') {
				$event_details = array(
					"type" => $event->getName(),
					"query" => $event->getQuery(),
					"time" => sprintf("%f", $event->getElapsedSecs())
				);
				if (count($event->getParams())) {
					$event_details["params"] = $event->getParams();
				}
				$events []= $event_details;
			}
		}

		$output .= print_r($events,1);
		$output .= "\nTotal Doctrine time: " . $time  . "\n";
		$output .= "Peak Memory: " . memory_get_peak_usage() . "";
		$output .= "\n\n------------------------------------------\n\n";
		
/* 		file_put_contents(BASEPATH."/logs/doctrine_profiler.php", $output); */

		flock($fp, LOCK_EX);
		fwrite($fp, $output);
		flock($fp, LOCK_UN);
		fclose($fp);

		@chmod($filepath, FILE_WRITE_MODE);
	}
}
