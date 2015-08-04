<?php
ini_set( 'display_errors', 'On' );
$cmcPath	= '/var/www/lib/cmClasses/trunk/';
$cmcVersion	= '';
$darkMode	= TRUE;

/*  --  NO NEED TO CHANGE BELOW  --  */
require_once $cmcPath.$cmcVersion.'/autoload.php5';
require_once 'FontAwesomeIndex.php';
new FontAwesomeIndex( isset( $_REQUEST['darkMode'] ) );
