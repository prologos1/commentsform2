<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

define('PATH', dirname(__FILE__));
require_once(PATH.'/conf.php');

require_once(PATH.'/classes/db.php');
// require_once(PATH.'/classes/dbroute.php');  // let's do it with autoload

function __autoload($class)
{
	if(is_file(PATH.'/classes/class.'.strtolower($class).'.php'))
			require(PATH.'/classes/class.'.strtolower($class).'.php');
}

$var_dbclass = new Dbroute();

// Request data processing
if( isset($_POST['act']) ) 
{
	switch ($_POST['act'])
	{
		case "send" :  
			echo $var_dbclass->SendComm();			
			exit();
			break;
		default :  
			exit();
	}
} else {
    // Default view
	$resultall = $var_dbclass->SelectAll();	
	$messages = array();	
	if (!$resultall) 
	{
		echo "<p> The request to fetch data from the database failed.</p>";
	} else {  
		while ( $row = $resultall->fetch_array() )
		{
			array_push($messages, $row); // $messages[] = $row;
		}
		array_walk_recursive($messages, "HTMLfilter");
		$resultall->close();		
	}
}

function HTMLfilter(&$val) {
  $val = htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

// Include views
require_once(PATH.'/views/header.php');
require_once(PATH.'/views/content.php');
require_once(PATH.'/views/footer.php');
?>