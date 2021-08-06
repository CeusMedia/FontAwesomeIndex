<?php

$darkMode		= !TRUE;														//  flag: force dark mode

//  --  NO NEET TO CHANGE BELOW  -----------------------------------------------//
																				//
(@include_once 'vendor/autoload.php') or die('Please install using composer, first!');

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

try {																			//  try to load libraries and tool application
	require_once 'inc/FontAwesomeIndex.php';									//  load main application class
	$darkMode = isset($_GET['darkMode'])  || $darkMode;							//  have an eye on dark mode
	new FontAwesomeIndex($darkMode);											//  run main application
} catch (Exception $e) {														//  catch exceptions on library load or application run
	UI_HTML_Exception_Page::display($e);										//  display exception
}

