<?php
namespace Sdz\BlogBundle\Services;

/**
 * Visitor manager class
 */
class ActualisationManager //extends \Twig_Extension
{
	/** last update storage file. */
	const LAST_UPDATE_STORAGE_FILE = "lastUpdate.txt";
	
	/** file read only mode. */
	const FILE_READ_ONLY_MODE = 'r';
	
	/** file read/write mode. */
	const FILE_READ_WRITE_MODE = 'r+';
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
	}
	
	/**
	 * Reads last update datetime.
	 */
	public function getLastUpdateDateTime() {
		// open file
		$lastUpdateStorageFile = fopen($this::LAST_UPDATE_STORAGE_FILE, $this::FILE_READ_ONLY_MODE);
	
		// read the first and unique line
		$lastUpdateDateTime = fgets($lastUpdateStorageFile);
	
		// Close the file
		fclose($lastUpdateStorageFile);
	
		return $lastUpdateDateTime;
	}
	
	/**
	 * update the last update datetime.
	 */
	public function updateLastUpdateDateTime() {
		// open file
		$lastUpdateStorageFile = fopen($this::LAST_UPDATE_STORAGE_FILE, $this::FILE_READ_WRITE_MODE);
		
		// Last update dateTime
		$date = new \Datetime();
	
		// write the last update datetime
		$lastUpdateDateTime = fputs($lastUpdateStorageFile, $date->format('Y-m-d H:i:s'));
	
		// Close the file
		fclose($lastUpdateStorageFile);
	
		return $lastUpdateDateTime;
	}
}
?>
