<?php     

	//Include global functions
include_once "../../../../includes/common.php";
//Initiate special database functions
include_once "../../../../includes/true_mysql.php";
//Use common ez_sql stuff too
include_once "../../../../includes/ez_sql.php";
// config
include_once "../../../../includes/configuration.php";

  session_start();
if(!isset($_SESSION['UserID']) || $_SESSION['UserType'] != "A")
  {
    header ("Location: ../../../../index.php?action=notauth");
	exit;
}


/**
 * This script loads data from the database and returns it to the js
 *
 */
       $tooosh = "toosh";// just using this to check if a hacker is trying to enter Editablegrid.php
require_once('../config.php');  // JUST TO LOAD THE DATA, YOU NEED CONFIG FILE TO CONNET DB    
require_once('EditableGrid.php');            

/**
 * fetch_pairs is a simple method that transforms a mysqli_result object in an array.
 * It will be used to generate possible values for some columns.
*/
function fetch_pairs($mysqli,$query){
	if (!($res = $mysqli->query($query)))return FALSE;
	$rows = array();
	while ($row = $res->fetch_assoc()) {
		$first = true;
		$key = $value = null;
		foreach ($row as $val) {
			if ($first) { $key = $val; $first = false; }
			else { $value = $val; break; } 
		}
		$rows[$key] = $value;
	}
	return $rows;
}


// Database connection
$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
$mysqli->real_connect($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']); 
                    
// create a new EditableGrid object
$grid = new EditableGrid();


$grid->addColumn('id', 'ID', 'integer', NULL, false); 
$grid->addColumn('component', 'Total FEE', 'string',  NULL, false);  
$grid->addColumn('school_name', 'School', 'string', fetch_pairs($mysqli,'SELECT school_names_id, school_names_desc FROM school_names'),true ); 
$grid->addColumn('school_year', 'Session', 'string', fetch_pairs($mysqli,'SELECT school_years_id, school_years_desc FROM school_years'),false ); 
$grid->addColumn('grades', 'Grade', 'string', fetch_pairs($mysqli,'SELECT grades_id, grades_desc FROM grades'),false ); 
$grid->addColumn('grades_term', 'Term', 'string', fetch_pairs($mysqli,'SELECT grade_terms_id, grade_terms_desc FROM grade_terms'),false ); 
$grid->addColumn('price', 'Price', 'integer',  NULL, true);  


$grid->addColumn('creator', 'Creator', 'string',  NULL, true);
$grid->addColumn('comment', 'Comment', 'string',  NULL, true);

$grid->addColumn('date', 'Date', 'date');  
$grid->addColumn('active', 'Active', 'boolean');  



$grid->addColumn('action', 'Action', 'html');  

$mygrade = $_GET['mygrade'];
$mysession = $_GET['mysession'];					 

				 
$result = $mysqli->query("SELECT *, date_format(date, '%d/%m/%Y') as date FROM school_fees WHERE component ='total' AND grades ='$mygrade' AND school_year ='$mysession'");
					 // AND grades_term ='$myterm'
						 
//$result = $mysqli->query('SELECT *, date_format(date, "%d/%m/%Y") as date FROM school_fees WHERE component ="total"');



$mysqli->close();

// send data to the browser
$grid->renderXML($result);

?>