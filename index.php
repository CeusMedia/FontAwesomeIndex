<?php
$darkMode		= TRUE;															//  flag: force dark mode
$pathCmCommon	= 'CeusMedia/Common/';											//  define if local installation without composer

//  --  NO NEET TO CHANGE BELOW  -----------------------------------------------//
																				//
/*  --  LIBRARY LOADING  --  */
$uriGhCmCommon	= "https://github.com/CeusMedia/Common";						//  URI of CeusMedia/Common at GitHub
try {																			//  try to load libraries and tool application
	if (file_exists(__DIR__.'/vendor/autoload.php')) {							//  found composer autoloader
		include_once __DIR__.'/vendor/autoload.php';							//  use composer autoloader
	} else if (empty($pathCmCommon)) {											//  path to instance of CeusMedia/Common is NOT defined
		throw new Exception(sprintf(											//  quit with exception
			'Install using composer or define path to instance of %s in %s!',	//  exception message with placeholders for sprintf
			'<a href="'.$uriGhCmCommon.'">CeusMedia/Common</a>',				//  first sprintf value: linked package name
			__FILE__															//  second sprintf value: script file name
		));
	}
	@include($pathCmCommon.'/autoload.php');									//  try to load CeusMedia/Common from local instance
	if (!class_exists('UI_HTML_PageFrame')) {									//  instance of CeusMedia/Common is not existing
		throw new Exception(sprintf(											//  quit with exception
			'Library %s not found in path %s.',									//  exception message with placeholders for sprintf
			'<a href="'.$uriGhCmCommon.'">CeusMedia/Common</a>',				//  first sprintf value: linked package name
			$pathCmCommon														//  second sprintf value: invalid library path
		));
	}
	require_once 'inc/FontAwesomeIndex.php';									//  load main application class
	$darkMode = isset($darkMode) ? $darkMode : isset($_REQUEST['darkMode']);	//  have an eye on dark mode
	new FontAwesomeIndex($darkMode);											//  run main application
} catch (Exception $e) {														//  catch exceptions on library load or application run
	if (class_exists('UI_HTML_Exception_Page')) {								//  exception display of CeusMedia/Common is available
		UI_HTML_Exception_Page::display($e);									//  display exception
	} else {																	//  library loading failed
		print $e->getMessage().PHP_EOL;											//  quit with exception message
	}
}
