<?php

session_start();

$sid = $_GET['sid'];

echo $sid;

require('connect_db.php');

$query = 'DELETE FROM resident
		WHERE studentID = '. $sid;

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	} 

	mysqli_close($dbc);
	header( 'Location: residents.php' ) ;
    exit;
?>